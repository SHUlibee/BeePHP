<?php
namespace BeePHP\Mvc;

use BeePHP\Di\Di;

abstract class Model{

    protected $defaultProperties;

    protected $relationProperties;

    /**
     * @var \BeePHP\Db\AdapterInterface
     */
    protected $dbAdapter;

    public function __construct(){
        $this->init();
        
    }

    abstract protected function init();

    public function find(){


        return $this;
    }

    public function save(){

    }

    public function create(){
        return 1;
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