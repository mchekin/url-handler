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
        $this->object = new Url();
    }

    /**
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->object = null;
    }
}