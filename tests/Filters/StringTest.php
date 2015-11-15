<?php
namespace Bricks\Validation\Filters;
require('Filter.php');
require('Filters/String.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class IntTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var String Тестируемый объект.
	 */
	private $filter;

	public function setUp(){
    $this->filter = new String;
  }

  /**
   * Должен приводить данные к строковому типу.
   */
  public function testFilter(){
    $this->assertEquals('1', $this->filter->filter(1, []));
    $this->assertEquals('-1', $this->filter->filter(-1, []));
    $this->assertEquals('1', $this->filter->filter(true, []));
  }
}
