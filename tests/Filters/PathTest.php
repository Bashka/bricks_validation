<?php
namespace Bricks\Validation\Filters;
require_once('Filter.php');
require_once('Filters/Path.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class PathTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Path Тестируемый объект.
	 */
	private $filter;

	public function setUp(){
    $this->filter = new Path;
  }

  /**
   * Должен приводить данные к целочисленному типу.
   */
  public function testFilter(){
    $path = '/Bricks/Validation/tests/Filters/PathTest.php';
    $this->assertEquals('/Bricks/Validation/tests/Filters', $this->filter->filter($path, ['path' => 'dir']));
    $this->assertEquals('PathTest.php', $this->filter->filter($path, ['path' => 'basename']));
    $this->assertEquals('PathTest', $this->filter->filter($path, ['path' => 'name']));
    $this->assertEquals('php', $this->filter->filter($path, ['path' => 'ext']));
  }
}
