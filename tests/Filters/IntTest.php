<?php
namespace Bricks\Validation\Filters;
require_once('Filter.php');
require_once('Filters/Int.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class IntTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Int Тестируемый объект.
	 */
	private $filter;

	public function setUp(){
    $this->filter = new Int;
  }

  /**
   * Должен приводить данные к целочисленному типу.
   */
  public function testFilter(){
    $this->assertEquals(1, $this->filter->filter('1', []));
    $this->assertEquals(-1, $this->filter->filter('-1', []));
    $this->assertEquals(0, $this->filter->filter('', []));
    $this->assertEquals(0, $this->filter->filter('a', []));
    $this->assertEquals(1, $this->filter->filter('1a', []));
  }
}
