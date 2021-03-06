<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class People extends Model{

    protected $defaultProperties = [
        'id', 'name',
        'computer',
    ];

    protected $relationProperties = [
//        'hasOne' => ['modelClass' => Computer::class, 'property' => 'computer'],
        'hasMany' => ['modelClass' => Computer::class, 'property' => 'computer'],
    ];
    
    protected $primaryKey = 'id';

    protected $tableName = 'bb_people';

    protected function init(){
//        $this->dbAdapter
        $this->hasOne(Computer::class, 'computer');
    }



}