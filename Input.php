<?php
namespace Bricks\Validation;
use Bricks\Validation\Filters;
use Bricks\Validation\Validators;

/**
 * Пакетный валидатор.
 *
 * @author Artur Sh. Mamedbekov
 */
class Input{
  /**
   * @var array Массив доступных фильтров.
   */
  private $filters;

  /**
   * @var array Массив доступных валидаторов.
   */
  private $validators;

  /**
   * @var array Карта валидации.
   */
  private $map;

  /**
   * @param array $map Карта валидации в виде ассоциативного массива, ключами 
   * которого являются проверяемые элементы, а значениями - коллекция фильтров и 
   * валидаторов.
   */
  public function __construct(array $map){
    $this->filters = [];
    $this->validators = [];
		$this->map = $map;

    $this->filter('integer', new Filters\Int);
    $this->filter('string', new Filters\String);
    $this->filter('trim', new Filters\Trim);
    $this->filter('intrange', new Filters\IntRange);
    $this->filter('strrange', new Filters\StringRange);
    $this->aliasFilter('integer', 'int');
    $this->aliasFilter('intrange', 'irange');
    $this->aliasFilter('string', 'str');
    $this->aliasFilter('strrange', 'srange');

    $this->validator('noempty', new Validators\NoEmpty);
    $this->validator('length', new Validators\Length);
    $this->validator('email', new Validators\Email);
    $this->validator('ip', new Validators\Ip);
    $this->validator('url', new Validators\Url);
    $this->aliasValidator('length', 'len');
  }

  /**
   * Регистрирует фильтр.
   * По умолчанию доступны следующие фильтры:
   *   - integer (int) - приведение к целому числу
   *   - string (str) - приведение к строке
   *   - trim - удаления с начала и конца строки незначащих символов
   *   - intrange (irange) - приведение к диапазону целых чисел. Используются 
   *   опции min и max для определения диапазона
   *   - strrange (srange) - приведение к длине строки. Используются опции min и 
   *   max для определения диапазона и опция pad для определения дополняющего 
   *   символа
   *
   * @param string $name Имя фильтра.
   * @param string|object $filter Экземпляр или имя класса фильтра.
   */
  public function filter($name, $filter){
    if(is_string($filter)){
      $filter = new $filter;
    }
    $this->filters[$name] = $filter;
  }

  /**
   * Регистрирует валидатор.
   * По умолчанию доступны следующие валидаторы:
   *   - length (len) - размерность данных или диапазон целых чисел
   *   - noempty - присутствие данных
   *   - email - проверка адреса электронной почты
   *   - ip - проверка IP адреса
   *   - url - проверка URL
   *
   * @param string $name Имя валидатора.
   * @param string|object $validator Экземпляр или имя класса валидатора.
   */
  public function validator($name, $validator){
    if(is_string($validator)){
      $validator = new $validator;
    }
    $this->validators[$name] = $validator;
  }

  /**
   * Регистрирует псевдоним фильтра.
   *
   * @param string $name Имя целевого фильтра.
   * @param string $alias Псевдоним.
   */
  public function aliasFilter($name, $alias){
    if(isset($this->filters[$name])){
      $this->filters[$alias] = &$this->filters[$name];
    }
  }

  /**
   * Регистрирует псевдоним валидатора.
   *
   * @param string $name Имя целевого валидатора.
   * @param string $alias Псевдоним.
   */
  public function aliasValidator($name, $alias){
    if(isset($this->validators[$name])){
      $this->validators[$alias] = &$this->validators[$name];
    }
  }

  /**
   * Фильтрует и проверят пакет данных в соответствии с используемой картой 
   * валидации.
   *
   * @param array $data Проверяемые данные.
   *
   * @throws ValidateException Выбрасывается если валидация не пройдена.
   *
   * @return array Проверенные и отфильтрованные данные.
   */
  public function validate(array $data){
    foreach($this->map as $name => $chain){
      if(!isset($data[$name])){
        continue;
      }

      foreach($chain as $component){
        if($component[0] == '!'){
          $filter = $this->filters[substr($component, 1)];
          $data[$name] = $filter->filter($data[$name], $chain);
        }
        elseif($component[0] == '?'){
          $validator = $this->validators[substr($component, 1)];
          if(!$validator->isValid($data[$name], $chain)){
            throw new ValidateException('Data "' . $name . '" invalid');
          }
        }
      }
    }
    return $data;
  }
}
