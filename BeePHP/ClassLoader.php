<?php
namespace BeePHP;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/20
 * Time: 16:28
 */
class ClassLoader{

    /**
     * 记录已载入的类文件
     */
    private $classMap;

    private $namespaces;

    private $dirs;

    private static $instance = null;

    public function __construct(){
        $this->registerNamespaces(array(
            'BeePHP' => __DIR__,
        ));
    }

    public function register(){
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * 自定义的自动加载机制
     */
    private function loadClass($class){

        if($file = $this->findFile($class, '.php')){
            include $file;

            return true;
        }
    }

    private function findFile($class, $ext){

        if(isset($this->classMap[$class])){
            return $this->classMap[$class];
        }

        //PSR-4  example:BeePHP\Db\Query
        $psrPath = strtr($class, '\\', DIRECTORY_SEPARATOR);
        $classArr = explode(DIRECTORY_SEPARATOR, $psrPath);
        $name = $classArr[0];
        if(isset($this->namespaces[$name])){
            $dir = $this->namespaces[$name];
            $file = $dir . DIRECTORY_SEPARATOR . str_replace($name, '', $psrPath) . $ext;
            if(file_exists($file)){
                $this->classMap[$class] = $file;
                return $file;
            }
        }

        //PSR-0 example:BeePHP_Db_Query 暂时不支持吧

        //如果没有找到注册命名空间的类，则遍历注册路径


    }

    /**
     * 指定一个命名空间对应的文件目录
     */
    public function registerNamespaces(array $namespaces){
        foreach ($namespaces as $name => $dir){
            $this->namespaces[$name] = $dir;
        }
        return $this;
    }

    public function registerDirs(array $dirs){
        foreach ($dirs as $dir) {
            $this->dirs[] = $dir;
        }
        return $this;
    }

    public function getNamespace($name){
        if(isset($this->namespaces[$name])){
            return $this->namespaces[$name];
        }

        throw new \Exception("没有注册 $name 命名空间！");
    }

}
