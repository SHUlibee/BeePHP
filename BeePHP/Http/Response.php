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

    /**
     * @var Header http头部信息
     */
    protected $header;

    function __construct(){
        $this->header = new Header();
    }

    function send(){
        $this->header->send();
        echo json_encode($this);
    }

}