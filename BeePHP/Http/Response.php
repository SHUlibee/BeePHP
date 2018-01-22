<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2018/1/16
 * Time: 15:20
 */

namespace BeePHP\Http;

/**
 * Class Response
 * @package BeePHP\Http
 */
class Response{

    private $object = null;

    /**
     * @var Header http头部信息
     */
    protected $header;

    /**
     * @return Header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param Header $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * 如果直接定义了初始化数据，则直接输出该数据
     * @param $object
     */
    function __construct($object = null){
        $this->header = new Header();
        $this->object = $object;
    }

    function send(){
        $this->header->send();
        if($this->object){
            echo json_encode($this->object);
        }else{
            echo json_encode($this);
        }
    }

}