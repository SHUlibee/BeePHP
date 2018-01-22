<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class Computer extends Model{

    protected $defaultProperties = [
        'id', 'cpu', 'brand'
    ];

    protected $relationProperties = [
        Model::BELONGS_TO => ['modelClass' => People::class, 'property' => 'people_id'],
    ];
    
    protected $primaryKey = 'id';

    protected $tableName = 'bb_computer';

    protected function init(){

    }
}