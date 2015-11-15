<?php
namespace Bricks\Validation\Validators;
require_once('Validator.php');
require_once('Validators/NoEmpty.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class NoEmptyTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var NoEmpty Тестируемый объект.
	 */
	private $validator;

	public function setUp(){
    $this->validator = new NoEmpty;
  }

  /**
   * Должен пропускать только не пустые множества.
   */
  public function testIsValid(){
    $this->assertTrue($this->validator->isValid('a', []));
    $this->assertTrue($this->validator->isValid([1], []));

    $this->assertFalse($this->validator->isValid('', []));
    $this->assertFalse($this->validator->isValid([], []));
  }
}
