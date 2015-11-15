<?php
namespace Bricks\Validation\Validators;
require_once('Validator.php');
require_once('Validators/Ip.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class IpTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Ip Тестируемый объект.
	 */
	private $validator;

	public function setUp(){
    $this->validator = new Ip;
  }

  /**
   * Должен пропускать только корректные IP-адреса.
   */
  public function testIsValid(){
    $this->assertTrue($this->validator->isValid('0.0.0.0', []));
    $this->assertTrue($this->validator->isValid('255.255.255.255', []));
    $this->assertTrue($this->validator->isValid('0.0.0.0', ['ip' => 4]));
    $this->assertTrue($this->validator->isValid('255.255.255.255', ['ip' => 4]));
    $this->assertTrue($this->validator->isValid('2001:0db8:11a3:09d7:1f34:8a2e:07a0:765d', ['ip' => 6]));

    $this->assertFalse($this->validator->isValid('', []));
    $this->assertFalse($this->validator->isValid('0.0.0', []));
    $this->assertFalse($this->validator->isValid('-1.0.0.0', []));
    $this->assertFalse($this->validator->isValid('256.255.255.255', []));
  }
}
