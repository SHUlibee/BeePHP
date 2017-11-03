<?php
namespace BeePHP\Mvc;

use BeePHP\Di\Di;
use BeePHP\Http\Request;

/**
 * 控制器基类
 * Class Controller
 * @package BeePHP\Mvc
 */
class Controller{

    /**
     * @var \BeePHP\Di\Di
     */
    protected $di;

    /**
     * @var \BeePHP\Http\Request
     */
    protected $request;

    public function __construct($di){
        $this->di = $di;
    }

    /**
     * @param mixed $request
     */
    public function setRequest(Request $request){
        $this->request = $request;
    }

    public function __call($name, $arguments){
        // TODO: Implement __call() method.
        var_dump($arguments, $name);
    }

    public function __get($name){
        // TODO: Implement __get() method.
    }

}
