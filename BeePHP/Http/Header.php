<?php
/**
 * 处理Http头部信息
 * User: libiying
 * Date: 2018/1/16
 * Time: 17:08
 */

namespace BeePHP\Http;


class Header{

    private $contentType = 'application/json';

    public function send(){
        header('Content-type:' . $this->contentType);
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }



}