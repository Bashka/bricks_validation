<?php
namespace Bricks\Validation\Filters;
require('Filter.php');
require('Filters/Trim.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class IntTest extends \PHPUnit_Framework_TestCase{
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
