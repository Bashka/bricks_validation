<?php
namespace Bricks\Validation\Filters;
require_once('Filter.php');
require_once('Filters/Trim.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class TrimTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Trim Тестируемый объект.
	 */
	private $filter;

	public function setUp(){
    $this->filter = new Trim;
  }

  /**
   * Должен обрезать символы с начала и конца строки.
   */
  public function testFilter(){
    $this->assertEquals('a', $this->filter->filter('a', ['trim' => ' ']));
    $this->assertEquals('a', $this->filter->filter(' a ', ['trim' => ' ']));
    $this->assertEquals('a', $this->filter->filter(' a ', []));
    $this->assertEquals('b', $this->filter->filter('aba', ['trim' => 'a']));
  }
}
