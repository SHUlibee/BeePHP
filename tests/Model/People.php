<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class People extends Model{

    protected $defaultProperties = [
        'id', 'name', 'computer'
    ];

    protected $relationProperties = [
//        'hasOne' => ['modelName' => Computer::class, 'property' => 'computer'],
        'hasMany' => ['modelName' => Computer::class, 'property' => 'computers'],
    ];
    
    protected $primaryKey = 'id';

    protected $tableName = 'bb_people';

    protected function init(){
//        $this->dbAdapter
        $this->hasOne(Computer::class, 'computer');
    }



}