<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/11/6
 * Time: 16:19
 */
namespace BeePHP\Mvc;

use BeePHP\Mvc\Model\Query;
use BeePHP\Mvc\Model\ModelFactory;

class Service {

    /**
     * 数据库适配器，使模型不用知道数据的具体来源
     * @var \BeePHP\Db\AdapterInterface
     */
    protected $dbAdapter;

    public function __construct($dbAdapter){
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * 查找对象
     * @param int $id
     * @param string $modelName
     * @return Model
     */
    public function find($id, $modelName){
        $model = ModelFactory::create($modelName);

        $sql = Query::select($model->getDefaultProperties()) . Query::from($model->getTableName()) . Query::WHERE . $model->getPrimaryKey() . "=" . $id;

        $res = $this->dbAdapter->query($sql);
        if(count($res) >= 1){
            foreach ($res[0] as $key => $value){
                $model->$key = $value;
            }
        }
        if($model->getRelationProperties()){
            foreach ($model->getRelationProperties() as $key => $relation){
                $rProperty = $relation['property'];
                $rModelName = $relation['modelName'];
                switch ($key){
                    case Model::HAS_ONE:
                        $rId = $model->getValue($relation['property']);
                        $model->$rProperty = $this->find($rId, $rModelName);
                        break;
                    case Model::HAS_MANY:
                        $model->$rProperty = $this->findList(array(), $rModelName);
                        break;
                    case Model::HAS_MANY_TO_MANY:
                        break;

                    default:
                }
            }
        }
        
        return $model;
    }

    /**
     * 查找数组对象
     */
    public function findList($where, $modelName){
        $models = [];
        $model = ModelFactory::create($modelName);

        $sql = Query::select($model->getDefaultProperties()) . Query::from($model->getTableName()) . Query::where($where);

        $res = $this->dbAdapter->query($sql);
        foreach ($res as $re){
            $model = ModelFactory::create($modelName);
            foreach ($re as $key => $value){
                $model->$key = $value;
            }
            $models[] = $model;
        }
        return $models;
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

    public function update(){

    }
}