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

    /**
     * 关联关系，四种：belongsTo hasOne hasMany hasManyToMany
     * @var
     */
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

    /**
     * 表字段前缀
     * @var
     */
    protected $prefix;

    public function __construct(){
        $this->init();
    }

    abstract protected function init();

    /**
     * @return mixed
     */
    public function getDefaultProperties(){
        return $this->defaultProperties;
    }

    /**
     * @return mixed
     */
    public function getRelationProperties(){
        return $this->relationProperties;
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

    public function getValue($name){
        if(isset($this->$name)){
            return $this->$name;
        }
        throw new \Exception("$name 属性不存在！");
    }

    /**
     * 属于
     * @param $refModelName
     * @param $refPropertyName
     * @param null $propertyName
     */
    protected function belongsTo($refModelName, $refPropertyName, $propertyName = null){
        
    }


    protected function hasOne($refModelName, $propertyName){

    }

    protected function hasMany(){

    }

    protected function hasManyToMany(){

    }
}