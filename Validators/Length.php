<?php
namespace Bricks\Validation\Validators;
use Bricks\Validation\Validator;

/**
 * Валидатор длины данных или вхождения числа в диапазон.
 *
 * @author Artur Sh. Mamedbekov
 */
class Length implements Validator{
  /**
   * Параметры:
   *   - min [optional] - нижняя граница диапазона
   *   - max [optional] - верхняя граница диапазона
   *
   * @see Validator::isValid
   */
  public function isValid($data, array $chain){
    if(is_int($data)){
      $length = $data;
    }
    elseif(is_string($data)){
      $length = mb_strlen($data, 'utf8');
    }
    elseif(is_array($data) || $data instanceof \Countable){
      $length = count($data);
    }

    if(isset($chain['min']) && $length < $chain['min']){
      return false;
    }
    elseif(isset($chain['max']) && $length > $chain['max']){
      return false;
    }
    return true;
  }
}
