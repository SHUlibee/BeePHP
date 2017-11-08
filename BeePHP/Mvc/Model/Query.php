<?php
namespace BeePHP\Mvc\Model;

class Query{

    const INSERT_INTO = ' INSERT INTO ';
    const FROM = ' FROM ';
    const SET = ' SET ';
    const VALUES = ' VALUES ';
    const SELECT = ' SELECT ';
    const WHERE = ' WHERE ';

    public function __construct(){
        echo 'query';
    }

    public function insert_into($query){

    }

    public static function select($params = '*'){
        $segment = " SELECT ";
        if(is_string($params)){
            $segment .= $params;
        }else if(is_array($params)){
            $segment .= implode(',', $params);
        }
        return $segment;
    }

    public static function from($table){
        $segment = " FROM " . $table;
        return $segment;
    }

    public static function where($params){
        $segment = " WHERE ";
        if(is_string($params)){
            $segment .= $params;
        }else if(is_array($params)){
            $segment .= implode(',', $params);
        }
        return $segment;
    }

}
