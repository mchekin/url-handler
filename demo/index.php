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

$urls = [
    'https://laravel.com/docs/5.2?show=me&the=bunny#server-requirements',
    'http://www.example.com/something/../else/page.php?foo=bar&url=http://www.example.com',
    'http://usr:pss@example.com:81/mypath/myfile.html?a=b&b[]=2&b[]=3#myfragment'
];

foreach ($urls as $url) {
    echo $url.'<br><br>';
    $urlHandler =  new Url($url);
    echo $urlHandler. '<br><hr>';
}
