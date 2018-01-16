<?php
namespace Test\Controllers;

use BeePHP\Db\Adapter\Mysql;
use BeePHP\Mvc\Controller;
use Test\Model\Computer;
use Test\Model\People;
use Test\Service\PeopleService;

class HttpController extends Controller{


    public function viewAction(){

//        var_dump($this->request->getParams());
        
        $dbAdapter = $this->di->getDynamic('dbAdapter');

        $people = new People();
        $computer = new Computer();
        $computer->cpu = 'i5 6400';
        $computer->brand = 'iphone';
        
        $people->name = 'libiying';
//        $people->computer = $computer;

        $service = new PeopleService($dbAdapter);
        echo (json_encode($service->find(1, People::class)));
//        echo (json_encode($service->findList(array(), People::class)));
//        var_dump($service->create($people));

        $this->redirect("");
    }

    public function kafkaTestAction(){
        
    }

}