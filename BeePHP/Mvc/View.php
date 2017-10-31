<?php
namespace BeePHP\Mvc;

class View{

    private static $VIEW_FILE = '';

    private static $VIEW_MASTER = '';

    private static $suffix = '.html';

    private static $master = '';

//    private static $_instance = NULL;

//    public static function create(){
//        if(!self::$_instance){
//            self::$_instance = new View_Bphp();
//        }
//        return self::$_instance;
//    }

    /**
     * 加载模版文件，渲染后，结束程序
     * @param String $template
     * @param array $data
     */
    public static function render($template, $data = NULL){

//        if(trim($template) == '') throw new Error_Bphp('模版文件名不能为空！');

        self::$VIEW_FILE	= VIEW_ROOT .'/' . strtolower($template).self::$suffix;
        self::$VIEW_MASTER	= self::$master ? VIEW_ROOT . '/' . self::$master . self::$suffix : '';

        if(file_exists(self::$VIEW_FILE)){

            $data['body_template'] = self::$VIEW_FILE;
            if($data){
                foreach ($data as $key=>$d){
//                    if(is_numeric($key)) throw new Error_Bphp('必须是 键\值 型数组');
                    $$key = $d;
                }
            }

            header('content-Type: text/html; charset=utf-8');
            if(self::$VIEW_MASTER){
                include(self::$VIEW_MASTER);
            }else{
                include(self::$VIEW_FILE);
            }
        }
        die;
    }

    /**
     * 设置是否使用master模版
     * @param $value
     */
    public function setMaster($value){
        self::$master = $value;
    }
    /**
     * 获取模版文件后缀
     * @return string
     */
    public function getSuffix(){
        return self::$suffix;
    }
    /**
     * 设置模版文件后缀
     * @param $value
     */
    public function setSuffix($value){
        self::$suffix = $value;
    }

}