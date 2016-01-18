<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 1/18/16
 * Time: 8:00 PM
 */

namespace Tests\Mchekin\UrlHandler;

use Mchekin\UrlHandler\Url;
use PHPUnit_Framework_TestCase;

class UrlTest extends PHPUnit_Framework_TestCase
{
    /** @var $object Url */
    protected $object;

    /**
     *  Set up which runs before each test
     */
    protected function setUp()
    {
        $this->object = new Url('');
    }

    /**
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->object = null;
    }

    /**
     * Array of values for the test data provider
     *
     * @var array
     */
    protected $urls = [
        'simple' => [[
            'input' => 'https://laravel.com/docs/5.2?show=me&the=bunny#server-requirements',
            'output' => 'https://laravel.com/docs/5.2?show=me&the=bunny#server-requirements'
        ]],
        'relative' => [[
            'input' => 'http://www.example.com/something/../else/page.php?foo=bar&url=http://www.example.com',
            'output' => 'http://www.example.com/else/page.php?foo=bar&url=http://www.example.com'
        ]],
        'full' => [[
            'input' => 'http://usr:pss@example.com:81/mypath/myfile.html?a=b&b[]=2&b[]=3#myfragment',
            'output' => 'http://usr:pss@example.com:81/mypath/myfile.html?a=b&b[]=2&b[]=3#myfragment'
        ]]
    ];

    /**
     * Test data provider
     *
     * @return array
     */
    public function urlDataProvider()
    {
        return $this->urls;
    }

    /**
     * Testing Url::__toString functionality using data provider
     *
     * @covers Url::__toString
     *
     * @dataProvider urlDataProvider
     * @param array $data
     */
    public function testToString(array $data)
    {
        // Arrange
        $url = $data['input'];
        $expectedClassName = Url::class;
        $expectedString = $data['output'];

        // Act
        $this->object = new Url($url);

        // Assert
        $this->assertInstanceOf($expectedClassName, $this->object);
        $this->assertEquals($expectedString, (string)$this->object);
    }

    /**
     *
     */
    public function testGetters()
    {
        // Arrange
        $url = 'http://usr:pss@example.com:81/mypath/myfile.html?a=b&b[]=2&b[]=3#myfragment';

        // Act
        $this->object = new Url($url);

        // Assert
        $this->assertEquals('http', $this->object->getScheme());
        $this->assertEquals('example.com', $this->object->getHost());
        $this->assertEquals('81', $this->object->getPort());
        $this->assertEquals('usr', $this->object->getUser());
        $this->assertEquals('pss', $this->object->getPass());
        $this->assertEquals('/mypath/myfile.html', $this->object->getPath());
        $this->assertEquals('a=b&b[]=2&b[]=3', $this->object->getQuery());
        $this->assertEquals('myfragment', $this->object->getFragment());
    }
}