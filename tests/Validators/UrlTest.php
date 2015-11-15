<?php
namespace Bricks\Validation\Validators;
require_once('Validator.php');
require_once('Validators/Url.php');

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

    $this->assertFalse($this->validator->isValid('', []));
    $this->assertFalse($this->validator->isValid('site.com', []));
    $this->assertFalse($this->validator->isValid('сайт.ком', []));
  }
}
