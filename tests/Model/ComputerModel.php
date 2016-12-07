<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class ComputerModel extends Model{

    protected $default_properties = [
        'id', 'cpu', 'brand'
    ];

    protected function init(){

    }
}