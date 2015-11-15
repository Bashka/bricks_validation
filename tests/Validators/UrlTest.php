<?php
namespace Bricks\Validation\Validators;
require('Validator.php');
require('Validators/Url.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class UrlTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Url Тестируемый объект.
	 */
	private $validator;

	public function setUp(){
    $this->validator = new Url;
  }

  /**
   * Должен пропускать только корректные IP-адреса.
   */
  public function testIsValid(){
    $this->assertTrue($this->validator->isValid('http://site.com', []));
    $this->assertTrue($this->validator->isValid('https://site.com/path/to/file', []));
    $this->assertTrue($this->validator->isValid('https://site.com/?a=1', []));
    $this->assertTrue($this->validator->isValid('https://site.com/#test', []));
    $this->assertTrue(filter_var('/path/to/file', FILTER_VALIDATE_URL));

    $this->assertFalse($this->validator->isValid('', []));
    $this->assertFalse($this->validator->isValid('site.com', []));
    $this->assertFalse($this->validator->isValid('сайт.ком', []));
  }
}
