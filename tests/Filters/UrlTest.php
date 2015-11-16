<?php
namespace Bricks\Validation\Filters;
require_once('Filter.php');
require_once('Filters/Url.php');

/**
 * @author Artur Sh. Mamedbekov
 */
class UrlTest extends \PHPUnit_Framework_TestCase{
  /**
   * @var Url Тестируемый объект.
	 */
	private $filter;

	public function setUp(){
    $this->filter = new Url;
  }

  /**
   * Должен приводить данные к целочисленному типу.
   */
  public function testFilter(){
    $url = 'http://tester:123@site.com:8080/path/to/file?a=1#test';
    $this->assertEquals('http', $this->filter->filter($url, ['url' => 'protocol']));
    $this->assertEquals('tester', $this->filter->filter($url, ['url' => 'user']));
    $this->assertEquals('123', $this->filter->filter($url, ['url' => 'pass']));
    $this->assertEquals('site.com', $this->filter->filter($url, ['url' => 'host']));
    $this->assertEquals('8080', $this->filter->filter($url, ['url' => 'port']));
    $this->assertEquals('/path/to/file', $this->filter->filter($url, ['url' => 'path']));
    $this->assertEquals('a=1', $this->filter->filter($url, ['url' => 'query']));
    $this->assertEquals('test', $this->filter->filter($url, ['url' => 'fragment']));
  }
}
