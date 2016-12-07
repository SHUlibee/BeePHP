<?php
namespace Test\Model;

use BeePHP\Mvc\Model;

class PeopleModel extends Model{

    protected $default_properties = [
        'id', 'name', 'sex'
    ];

    protected function init(){

    }

}