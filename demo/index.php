<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 1/18/16
 * Time: 8:31 PM
 */

use Mchekin\UrlHandler\Url;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../vendor/autoload.php';

$url = 'https://laravel.com/docs/5.2?show=me&the=bunny#server-requirements';

echo $url.'<br>';

$urlHandler =  new Url('http://www.example.com/something/../else/page.php?foo=bar&url=http://www.example.com');

echo $urlHandler;