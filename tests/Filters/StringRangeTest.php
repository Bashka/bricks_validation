<?php
namespace Bricks\Validation\Filters;
require('Filter.php');
require('Filters/StringRange.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class IntTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var StringRange Тестируемый объект.
	 */
	private $filter;

	public function setUp(){
    $this->filter = new StringRange;
  }

  /**
   * Должен приводить длину строки к диапазону.
   */
  public function testFilter(){
    $this->assertEquals('aa', $this->filter->filter('aa', ['min' => 2, 'max' => 5]));
    $this->assertEquals('a ', $this->filter->filter('a', ['min' => 2, 'max' => 5, 'pad' => ' ']));
    $this->assertEquals('aaaaa', $this->filter->filter('aaaaaa', ['min' => 2, 'max' => 5]));
  }
}
