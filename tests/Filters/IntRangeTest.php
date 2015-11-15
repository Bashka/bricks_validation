<?php
namespace Bricks\Validation\Filters;
require_once('Filter.php');
require_once('Filters/IntRange.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class IntRangeTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var IntRange Тестируемый объект.
	 */
	private $filter;

	public function setUp(){
    $this->filter = new IntRange;
  }

  /**
   * Должен приводить целочисленные данные к диапазону.
   */
  public function testFilter(){
    $this->assertEquals(1, $this->filter->filter(1, ['min' => 0, 'max' => 5]));
    $this->assertEquals(5, $this->filter->filter(6, ['min' => 0, 'max' => 5]));
    $this->assertEquals(0, $this->filter->filter(-1, ['min' => 0, 'max' => 5]));
    $this->assertEquals(999, $this->filter->filter(999, ['min' => 0]));
    $this->assertEquals(-1, $this->filter->filter(-1, ['max' => 5]));
  }
}
