<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/11/6
 * Time: 16:19
 */
namespace BeePHP\Mvc;

use BeePHP\Mvc\Model\Query;

class Service {

    /**
     * 数据库适配器，使模型不用知道数据的具体来源
     * @var \BeePHP\Db\AdapterInterface
     */
    protected $dbAdapter;

    public function __construct($dbAdapter){
        $this->dbAdapter = $dbAdapter;
    }

    public function find(){

    }

    public function save(){
    }

    /**
     * @param Model $model
     * @return mixed
     */
    public function create($model){

        $values = array();
        $properties = array();
        foreach ($model->getDefaultProperties() as $property){
            // 如果已设置属性，并且非主键
            if (isset($model->$property) && $property != $model->getPrimaryKey()){
                $values[] = is_string($model->$property) ? "'" . $model->$property . "'" : $model->$property;
                $properties[] = $property;
            }
        }

        $sql = Query::INSERT_INTO . $model->getTableName() . '(' . implode(',', $properties)  . ')' . Query::VALUES . '(' . implode(',', $values) . ')';

        $res = $this->dbAdapter->execute($sql, $model->getPrimaryKey());
        return $res;
    }

    public function delete(){

    }
}