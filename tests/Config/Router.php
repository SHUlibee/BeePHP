<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2018/1/17
 * Time: 10:42
 */

$router = new \BeePHP\Mvc\Router();
$router->add('/http/index', [
    'Controller' => 'Test\Controllers\HttpController',
    'Action' => 'viewAction'
]);
$router->add('/', [
    'Controller' => 'Test\Controllers\IndexController',
    'Action' => 'indexAction'
]);