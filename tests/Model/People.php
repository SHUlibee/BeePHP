<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class People extends Model{

    protected $defaultProperties = [
        'id', 'name', 'computer'
    ];
    
    protected $primaryKey = 'id';

    protected $tableName = 'bb_people';

    protected function init(){
//        $this->dbAdapter
    }

}