<?php
namespace BeePHP\Di;

/**
 * 依赖注入
 * 系统默认service：router，Controller，view
 * Class Di
 * @package BeePHP\Di
 */
class Di{

    /**
     * 注册服务列表
     */
    protected static $service;

    public function set($name, $definition, $share = false){
        self::$service[$name] = [
            'definition' => $definition,
            'share' => $share,
        ];

    }

    public function get($name, $orNull = false){
        if(isset(self::$service[$name])){
            return self::$service[$name]['definition'];
        }
        if($orNull){
            return null;
        }
        throw new \Exception("服务 $name 不存在！");
    }

    public function exist($name){
        if(isset(self::$service[$name])){
            return true;
        }
        return false;
    }

}