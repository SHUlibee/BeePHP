<?php
phpinfo();die;
//开启错误提示
ini_set('display_errors', 1);
//设置报错级别
error_reporting(E_ALL);

require '../BeePHP/autoload.php';

$loader = new \BeePHP\ClassLoader();
$loader->registerNamespaces(array(
    'Test' => __DIR__
))->register();

use Test\Controllers\HttpController;

$tt = new HttpController();
$tt->viewAction();
