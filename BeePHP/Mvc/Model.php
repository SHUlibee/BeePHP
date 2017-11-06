<?php
namespace BeePHP\Mvc;

use BeePHP\Di\Di;
use BeePHP\Mvc\Model\Query;

/**
 * 模型基类
 * Class Model
 * @package BeePHP\Mvc
 */
abstract class Model{

    protected $defaultProperties;

    protected $relationProperties;

    /**
     * 主表名称
     * @var string
     */
    protected $tableName;

    /**
     * 主键
     * @var string
     */
    protected $primaryKey;

    abstract protected function init();

    /**
     * @return mixed
     */
    public function getDefaultProperties(){
        return $this->defaultProperties;
    }

    /**
     * @return string
     */
    public function getTableName(){
        return $this->tableName;
    }

    /**
     * @return string
     */
    public function getPrimaryKey(){
        return $this->primaryKey;
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