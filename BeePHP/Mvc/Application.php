<?php
namespace BeePHP\Mvc;
use BeePHP\Aop\ControllerAspect;
use BeePHP\Http\Request;

/**
 * 应用配置启动类
 * Class Application
 * @package BeePHP\Mvc
 */
class Application{

    /**
     * @var \BeePHP\Di\Di
     */
    protected $di;

    /**
     * @var \BeePHP\Mvc\Controller
     */
    protected $controller;

    /**
     * @var string 控制器类名称
     */
    protected $controllerName;

    /**
     * @var string 控制器方法名
     */
    protected $actionName;

    protected $getVars;

    public function __construct($di){
        $this->di = $di;

        $this->init();
    }

    protected function init(){

        $request = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $request = explode('?', $request);

        $uri = isset($request[0]) ? $request[0] : '';
        $query = isset($request[1]) ? $request[1] : '';

        //解析控制器和动作
        $paths = $this->di->get('router')->getPaths($uri, $method);
        if(!isset($paths['Controller'])){
            throw new \Exception("没有配置controller");
        }
        if(!isset($paths['Action'])){
            throw new \Exception("没有配置action");
        }
        $this->controllerName = $paths['Controller'];
        $this->actionName = $paths['Action'];

        //解析出GET参数
        $parsed = explode('&', $query);
        $getVars = array();
        foreach ($parsed as $argument){
            if($argument){
                list($variable, $value) = explode('=', $argument);
                $getVars[$variable] = $value;
            }
        }
        $this->getVars = $getVars;
    }


    public function run(){

        $controllerName = $this->controllerName;
        $actionName = $this->actionName;
        $getVars = $this->getVars;

        $request = new Request();
        $request->setParams($getVars);

        $this->controller = new $controllerName($this->di);
        $this->controller->setRequest($request);
        if(method_exists($this->controller, $actionName)){
//            $this->controller->$actionName();

            if($aspect = $this->di->get('controllerAspect', true)){
                $aspect->wrap($this->controller);
                call_user_func_array(array($aspect, $actionName), []);
            }else{
                $ctl = call_user_func_array(array($this->controller, $actionName), []);
                $ctl->send();
            }
        }

    }

}
