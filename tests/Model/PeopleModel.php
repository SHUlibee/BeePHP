<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class PeopleModel extends Model{

    protected $defaultProperties = [
        'id', 'name', 'sex', 'computer'
    ];

    protected function init(){
//        $this->dbAdapter
    }

}