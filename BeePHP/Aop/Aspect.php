<?php
namespace BeePHP\Aop;

/**
 * 切面
 * Class Aspect
 * @package BeePHP\Aop
 */
abstract class Aspect implements AspectInterface{

    private $source;

    /**
     * 调用源对象的方法之前先执行before方法；调用源对象的方法之后再执行after方法
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments){
        // TODO: Implement __call() method.
        $this->before();
        $ret = call_user_func_array(array($this->source, $name), $arguments);
        $this->after();

        return $ret;
    }

    abstract public function before();

    abstract public function after();

    /**
     * 注入源对象
     * @param $source
     */
    public function wrap($source){
        $this->source = $source;
    }
}