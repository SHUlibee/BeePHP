<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/11/3
 * Time: 10:50
 */
namespace BeePHP;

class Config{
    private $params = array();

    /**
     * @return array
     */
    public function get($name){
        if(isset($this->params[$name])){
            return $this->params[$name];
        }
        return null;
    }

}