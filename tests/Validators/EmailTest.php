<?php
namespace Bricks\Validation\Validators;
require('Validator.php');
require('Validators/Email.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class EmailTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Email Тестируемый объект.
	 */
	private $validator;

	public function setUp(){
    $this->validator = new Email;
  }

  /**
   * Должен пропускать только корректные адреса email.
   */
  public function testIsValid(){
    $this->assertTrue($this->validator->isValid('t-e.st@m-ail.com', []));

    $this->assertFalse($this->validator->isValid('', []));
    $this->assertFalse($this->validator->isValid('test', []));
    $this->assertFalse($this->validator->isValid('test@mail', []));
    $this->assertFalse($this->validator->isValid('test@mail-.com', []));
  }
}
