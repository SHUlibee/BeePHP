<?php
namespace BeePHP\Mvc;

use BeePHP\Di\Di;
use BeePHP\Http\Request;

class Controller{

    /**
     * @var \BeePHP\Http\Request
     */
    protected $request;

    /**
     * @var \BeePHP\Mvc\View
     */
    protected $view;

    /**
     * @param mixed $request
     */
    public function setRequest(Request $request){
        $this->request = $request;
    }

    /**
     * @param mixed $view
     */
    public function setView(View $view){
        $this->view = $view;
    }

    public function __call($name, $arguments){
        // TODO: Implement __call() method.
        var_dump($arguments, $name);
    }

    public function __get($name){
        // TODO: Implement __get() method.
    }

}
