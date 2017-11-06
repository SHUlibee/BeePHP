<?php
namespace Test\Controllers;

use BeePHP\Db\Adapter\Mysql;
use BeePHP\Mvc\Controller;
use Test\Model\ComputerModel;
use Test\Model\People;
use Test\Service\PeopleService;

class HttpController extends Controller{


    public function viewAction(){

        var_dump($this->request->getParams());
        
        $dbAdapter = new Mysql(array(
            'host' => '127.0.0.1',
            'dbname' => 'beeblog',
            'username' => 'root',
            'password' => '',
        ));

        $people = new People();
        $computer = new ComputerModel();
        $computer->cpu = 'i5 6400';
        $computer->brand = 'iphone';
        
        $people->name = 'libiying';
//        $people->computer = $computer;

        $service = new PeopleService($dbAdapter);
        var_dump($service->create($people));
        
    }

    public function kafkaTestAction(){
        
    }

}