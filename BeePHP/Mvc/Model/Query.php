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
        $flagment = " SELECT ";
        if(is_string($params)){
            $flagment .= $params;
        }else if(is_array($params)){
            $flagment .= implode(',', $params);
        }
        return $flagment;
    }

}
