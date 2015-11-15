<?php
namespace Bricks\Validation\Validators;
require_once('Validator.php');
require_once('Validators/Regex.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class RegexTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Regex Тестируемый объект.
	 */
	private $validator;

	public function setUp(){
    $this->validator = new Regex;
  }

  /**
   * Должен пропускать только корректные адреса email.
   */
  public function testIsValid(){
    $this->assertTrue($this->validator->isValid('test@mail.com', ['regex' => '~^[a-z]+@[a-z.]+$~']));

    $this->assertFalse($this->validator->isValid('te-st@mail.com', ['regex' => '~^[a-z]+@[a-z.]+$~']));
  }
}
