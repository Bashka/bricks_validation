<?php
namespace Bricks\Validation;
require_once('Validator.php');
require_once('Filter.php');

require_once('Filters/Int.php');
require_once('Filters/String.php');
require_once('Filters/Trim.php');
require_once('Filters/IntRange.php');
require_once('Filters/StringRange.php');

require_once('Validators/NoEmpty.php');
require_once('Validators/Length.php');
require_once('Validators/Email.php');
require_once('Validators/Ip.php');
require_once('Validators/Url.php');

require_once('ValidateException.php');
require_once('Input.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class InputTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Input Тестируемый объект.
	 */
	private $input;

	public function setUp(){
    $this->input = new Input([
      'id' => ['!int', '?len', 'min' => 1],
      'title' => ['!str', '!trim', '?len', 'min' => 1, 'max' => 5],
    ]);
  }

  /**
   * Должен валидировать данные.
   */
  public function testValidate(){
    $this->assertEquals(['id' => 5, 'title' => 'test'], $this->input->validate(['id' => 5, 'title' => ' test']));
  }

  /**
   * Должен выбрасывать исключение если данные не валидны
   */
  public function testValidate_shouldThrowExceptionIsInvalid(){
    $this->setExpectedException(get_class(new ValidateException));
    $this->input->validate(['id' => 0, 'title' => '']);
  }

  /**
   * Должен определять псевдоним фильтра.
   */
  public function testAliasFilter(){
    $input = new Input(['title' => ['!a']]);
    $input->aliasFilter('string', 'a');
    $this->assertEquals(['title' => '1'], $input->validate(['title' => 1]));
  }

  /**
   * Должен определять псевдоним валидатора.
   */
  public function testAliasValidator(){
    $input = new Input(['title' => ['?ne']]);
    $input->aliasValidator('noempty', 'ne');
    $this->assertEquals(['title' => 'test'], $input->validate(['title' => 'test']));
  }
}
