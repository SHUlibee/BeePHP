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

    protected $modelClass;

    /**
     * @return mixed
     */
    public function getModelClass()
    {
        return $this->modelClass;
    }

    /**
     * @param mixed $modelClass
     */
    public function setModelClass($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * @return \BeePHP\Db\AdapterInterface
     */
    public function getDbAdapter(){
        return $this->dbAdapter;
    }

    /**
     * @param \BeePHP\Db\AdapterInterface $dbAdapter
     */
    public function setDbAdapter($dbAdapter){
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * 查找对象（可以查找出关联对象）
     * @param int $id
     * @param string $modelClass
     *
     * @return Model
     */
    public function find($id, $modelClass = null){
        if ($modelClass == null){
            $modelClass = $this->getModelClass();
        }

        $model = ModelFactory::create($modelClass);
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
                $rmodelClass = $relation['modelClass'];
                switch ($key){
                    case Model::HAS_ONE:
                        $rId = $model->getValue($relation['property']);
                        $model->$rProperty = $this->find($rId, $rmodelClass);
                        break;
                    case Model::HAS_MANY:
                        echo $rmodelClass;
                        $model->$rProperty = $this->findList(array(), $rmodelClass);
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
     * @param array $where
     * @param string $modelClass
     *
     * @return array
     */
    public function findList($where, $modelClass = null){
        if ($modelClass == null){
            $modelClass = $this->getModelClass();
        }
        $models = [];
        $model = ModelFactory::create($modelClass);
        $sql = Query::select($model->getDefaultProperties()) . Query::from($model->getTableName()) . Query::where($where);
        $res = $this->dbAdapter->query($sql);

        foreach ($res as $re){
            $model = ModelFactory::create($modelClass);
            foreach ($re as $key => $value){
                $model->$key = $value;
            }
            $models[] = $model;
        }

        return $models;
    }

    /**
     * @param $where
     * @param $modelClass
     *
     * @return int
     */
    public function count($where, $modelClass = null){
        if ($modelClass == null){
            $modelClass = $this->getModelClass();
        }
        
        $model = ModelFactory::create($modelClass);
        $sql = Query::count() . Query::from($model->getTableName()) . Query::where($where);
        $res = $this->dbAdapter->query($sql);

        if(count($res) > 0 && isset($res[0]['num'])){
            return $res[0]['num'];
        }
        return null;
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