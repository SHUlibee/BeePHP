<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/11/7
 * Time: 13:51
 */
namespace BeePHP\Mvc\Model;

use BeePHP\Mvc\Model;

/**
 * Class ModelFactory 模型工厂
 * @package BeePHP\Mvc\Model
 */
class ModelFactory{

    /**
     * 模型生产
     * @param $modelName
     * @return Model
     * @throws \Exception
     */
    public static function create($modelName){
        if(class_exists($modelName)){
            return new $modelName();
        }
        throw new \Exception("$modelName 类不存在！");
    }

    public static function convert(array $data, $modelName){
        $model = ModelFactory::create($modelName);
        if($data != null){
            foreach ($data as $key => $value){
                $model->$key = $value;
            }
        }
        return $model;
    }
    
}