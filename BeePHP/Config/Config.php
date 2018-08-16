<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/11/3
 * Time: 10:50
 */
namespace BeePHP\Config;

class Config{

    private static $_instance = null;

    private static $params = array();

    /**
     * 私有化构造函数，防止外部实例化
     * @param $params
     */
    private function __construct($params){
        self::$params = $params;
    }

    public static function create($params){
        if(!self::$_instance){
            self::$_instance = new Config($params);
        }
        return self::$_instance;
    }

    /**
     * @return array
     */
    public function get($name){
        if(isset(self::$params[$name])){
            return self::$params[$name];
        }
        return null;
    }

}