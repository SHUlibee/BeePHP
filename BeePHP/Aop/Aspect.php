<?php
namespace BeePHP\Aop;

abstract class Aspect implements AspectInterface{

    private $source;

    public function __call($name, $arguments){
        // TODO: Implement __call() method.
        $this->before();
        $ret = call_user_func_array(array($this->source, $name), $arguments);
        $this->after();

        return $ret;
    }

    abstract public function before();

    abstract public function after();

    public function wrap($source){
        $this->source = $source;
    }
}