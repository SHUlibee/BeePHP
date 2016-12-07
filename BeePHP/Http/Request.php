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
     * @return mixed
     */
    public function getParams(){
        return $this->params;
    }
}