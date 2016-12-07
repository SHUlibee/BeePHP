<?php
namespace BeePHP\Mvc;

class Router{

    protected $routes;

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    public function add($pattern, $paths, $httpMethod = ['GET', 'POST']){
        if(in_array(self::METHOD_GET, $httpMethod)){
            $this->addGet($pattern, $paths);
        }
        if(in_array(self::METHOD_POST, $httpMethod)){
            $this->addPost($pattern, $paths);
        }
    }

    public function addGet($pattern, $paths){
        $this->routes[self::METHOD_GET][$pattern] = $paths;
    }

    public function addPost($pattern, $paths){
        $this->routes[self::METHOD_POST][$pattern] = $paths;
    }

    /**
     * 匹配配置的路由，暂不支持正则匹配
     * @param $request
     * @param $method
     * @return mixed
     * @throws \Exception
     */
    public function getPaths($request, $method){
        foreach ($this->routes[$method] as $pattern => $paths){

            if($pattern == $request){
                return $paths;
            }
        }
        throw new \Exception("不存在 $request 路由");
    }
    
}
