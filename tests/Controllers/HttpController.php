<?php
namespace Test\Controllers;

use BeePHP\Db\Adapter\Mysql;
use BeePHP\Mvc\Controller;
use Test\Model\ComputerModel;
use Test\Model\PeopleModel;

class HttpController extends Controller{


    public function viewAction(){

        var_dump($this->request->getParams());
        
        $dbAdapter = new Mysql(array(
            'host' => '127.0.0.1',
            'dbname' => 'beeblog',
            'username' => 'root',
            'password' => '',
        ));

        $people = new PeopleModel($dbAdapter);
        $computer = new ComputerModel($dbAdapter);
        $computer->cpu = 'i5 6400';
        $computer->brand = 'iphone';
        
        $people->name = 'libiying';
        $people->computer = $computer;
        
        var_dump($computer, $people);
    }

    public function kafkaTestAction(){
        
    }

}