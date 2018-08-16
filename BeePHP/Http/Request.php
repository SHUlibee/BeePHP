<?php
namespace BeePHP\Http;

class Request{
    protected $params;

    /**
     * @param mixed $params
     */
    public function setParams($params){
        $this->params = $params;
    }

    /**
     * 获取get参数
     * @return mixed
     */
    public function getParams(){
        return $this->params;
    }

    /**
     * 判断是否post提交
     * @return bool
     */
    public function isPost(){
        if(ucwords($_SERVER['REQUEST_METHOD']) == 'POST'){
            return true;
        }
        return false;
    }

    /**
     * 获取post参数
     * @return mixed
     */
    public function getPost(){
        return $_POST;
    }
}