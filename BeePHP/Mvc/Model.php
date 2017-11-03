<?php
namespace BeePHP\Mvc;

use BeePHP\Di\Di;

/**
 * 模型基类
 * Class Model
 * @package BeePHP\Mvc
 */
abstract class Model{

    protected $defaultProperties;

    protected $relationProperties;

    /**
     * 数据库适配器，使模型不用知道数据的具体来源
     * @var \BeePHP\Db\AdapterInterface
     */
    protected $dbAdapter;

    public function __construct($dbAdapter){
        $this->dbAdapter = $dbAdapter;

        $this->init();
    }

    abstract protected function init();

    public function find(){


        return $this;
    }

    public function save(){

    }

    public function create(){

    }

    public function delete(){

    }

    public function __set($name, $value){
        if(in_array($name, $this->defaultProperties)){
            $this->$name = $value;
        }
    }

    public function __get($name){
        if(in_array($name, $this->defaultProperties)){
            return property_exists($this, $name) ? $this->$name : null;
        }
    }

    /**
     * 属于
     */
    protected function belongsTo($propertyName, $refModelName, $refPropertyName){
        
    }


    protected function hasOne(){

    }

    protected function hasMany(){

    }

    protected function hasManyToMany(){

    }
}