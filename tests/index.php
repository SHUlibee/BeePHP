<?php

//开启错误提示
ini_set('display_errors', 1);
//设置报错级别
error_reporting(E_ALL);

require '../BeePHP/autoload.php';

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
    'Controller' => 'Index',
    'Action' => 'index'
]);

//依赖注入
$di = new \BeePHP\Di\Di();
$di->set('loader', $loader);
$di->set('router', $router);
$di->set('controllerAspect', new \Test\Aspect\ControllerAspect());

$app = new \BeePHP\Mvc\Application($di);
$app->run();