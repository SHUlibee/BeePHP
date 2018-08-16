<?php
namespace BeePHP\Di;

/**
 * 依赖注入
 * 系统组件：router，Controller，view
 * Class Di
 * @package BeePHP\Di
 */
class Di{

    /**
     * 注册服务列表
     */
    protected static $service;

    /**
     * 注入静态组件（已经实例化的组件）
     * @param $name string 组件名称
     * @param $definition object 组件
     */
    public function set($name, $definition){
        self::$service[$name] = [
            'definition' => $definition,
        ];
    }

    /**
     * 注入动态组件（当使用时才会实例化的组件）
     * @param $name
     * @param $class
     * @param null $args
     */
    public function setDynamic($name, $class, $args = null){
        self::$service[$name] = [
            'class' => $class,
            'args' => $args,
        ];
    }

    public static function get($name, $orNull = false){
        if(isset(self::$service[$name])){
            return self::$service[$name]['definition'];
        }
        if($orNull){
            return null;
        }
        throw new \Exception("组件 $name 不存在！");
    }

    /**
     * 获取动态组件
     * @param $name
     * @param bool $orNull
     * @return null
     * @throws \Exception
     */
    public static function getDynamic($name, $orNull = false){
        if(isset(self::$service[$name])){
            $class = self::$service[$name]['class'];
            $args = self::$service[$name]['args'];
            self::$service[$name]['definition'] = new $class($args);
            return self::$service[$name]['definition'];
        }
        if($orNull){
            return null;
        }
        throw new \Exception("组件 $name 不存在！");
    }

    public function exist($name){
        if(isset(self::$service[$name])){
            return true;
        }
        return false;
    }

}