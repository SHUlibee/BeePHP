<?php
namespace BeePHP\Mvc;

use BeePHP\Di\Di;
use BeePHP\Http\Request;

/**
 * 控制器基类
 * Class Controller
 * @package BeePHP\Mvc
 */
class Controller{

    /**
     * @var \BeePHP\Di\Di
     */
    protected $di;

    /**
     * @var \BeePHP\Http\Request
     */
    protected $request;

    public function __construct($di){
        $this->di = $di;
    }

    /**
     * @param mixed $request
     */
    public function setRequest(Request $request){
        $this->request = $request;
    }

    public function __call($name, $arguments){
        // TODO: Implement __call() method.
        var_dump($arguments, $name);
    }

    public function __get($name){
        // TODO: Implement __get() method.
    }

    /**
     * 地址重定向
     * @param $uri          control/action
     * @param null $param   get_string | array('key1'=>'val1')
     */
    public function redirect($uri, $param=null){
        $u = '/'.$uri;

        //构造get参数
        $str = '';
        if(is_string($param)){
            $first = substr($param, 0, 1);
            if($first != '?'){
                $str = '?'.$param;
            }else{
                $str = $param;
            }
        }else if(is_array($param)){
            foreach($param as $key=>$val){
                $str .= $key.'='.$val.'&';
            }
            $str = '?'.rtrim($str, '&');
        }
        $u .= $str;
        header("Location: $u"); die;
    }

}
