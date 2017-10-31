<?php

//开启错误提示
ini_set('display_errors', 1);
//设置报错级别
error_reporting(E_ALL);

require '../BeePHP/autoload.php';

//定义常量
define('SERVER_ROOT', dirname(__FILE__));//应用根目录
define('VIEW_ROOT', dirname(__FILE__) . "/View");


//自动加载
$loader = new \BeePHP\ClassLoader();
$loader->registerDirs([
//    __DIR__ . "/Controllers",
])->registerNamespaces([
    'Test' => __DIR__
])->register();

//路由控制
$router = new \BeePHP\Mvc\Router();
$router->add('/http/index', [
    'Controller' => 'Test\Controllers\HttpController',
    'Action' => 'viewAction'
]);
$router->add('/', [
    'Controller' => 'Test\Controllers\IndexController',
    'Action' => 'indexAction'
]);

//依赖注入
$di = new \BeePHP\Di\Di();
$di->set('loader', $loader);
$di->set('router', $router);
$di->set('controllerAspect', new \Test\Aspect\ControllerAspect());

$app = new \BeePHP\Mvc\Application($di);
$app->run();