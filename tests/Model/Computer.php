<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class Computer extends Model{

    protected $defaultProperties = [
        'id', 'cpu', 'brand'
    ];
    
    protected $primaryKey = 'id';

    protected $tableName = 'bb_computer';

    protected function init(){

    }
}