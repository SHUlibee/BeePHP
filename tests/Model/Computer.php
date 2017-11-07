<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class Computer extends Model{

    protected $defaultProperties = [
        'id', 'cpu', 'brand'
    ];

    protected function init(){

    }
}