<?php
namespace Bricks\Validation\Validators;
require_once('Validator.php');
require_once('Validators/Length.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class LengthTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Length Тестируемый объект.
	 */
	private $validator;

	public function setUp(){
    $this->validator = new Length;
  }

  /**
   * Должен пропускать только коллекции или числа, длина которых входит в 
   * диапазон.
   */
  public function testIsValid(){
    $this->assertTrue($this->validator->isValid('a', ['min' => 1, 'max' => 5]));
    $this->assertTrue($this->validator->isValid('aaaaa', ['min' => 1, 'max' => 5]));
    $this->assertTrue($this->validator->isValid(1, ['min' => 1, 'max' => 5]));
    $this->assertTrue($this->validator->isValid(5, ['min' => 1, 'max' => 5]));
    $this->assertTrue($this->validator->isValid([1], ['min' => 1, 'max' => 5]));
    $this->assertTrue($this->validator->isValid([1, 2, 3, 4, 5], ['min' => 1, 'max' => 5]));

    $this->assertFalse($this->validator->isValid('', ['min' => 1, 'max' => 5]));
    $this->assertFalse($this->validator->isValid('aaaaaa', ['min' => 1, 'max' => 5]));
    $this->assertFalse($this->validator->isValid(0, ['min' => 1, 'max' => 5]));
    $this->assertFalse($this->validator->isValid(6, ['min' => 1, 'max' => 5]));
    $this->assertFalse($this->validator->isValid([], ['min' => 1, 'max' => 5]));
    $this->assertFalse($this->validator->isValid([1, 2, 3, 4, 5, 6], ['min' => 1, 'max' => 5]));
  }
}
