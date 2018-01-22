<?php
namespace Test\Controllers;

use BeePHP\Db\Adapter\Mysql;
use BeePHP\Http\Response;
use BeePHP\Mvc\Controller;
use Test\Model\Computer;
use Test\Model\People;
use Test\Service\PeopleService;

/**
 * http接口控制器
 * @package Test\Controllers
 */
class HttpController extends Controller{


    public function viewAction(){

//        var_dump($this->request->getParams());


        $people = new People();
        $computer = new Computer();
        $computer->cpu = 'i5 6400';
        $computer->brand = 'iphone';
        
        $people->name = 'libiying';
//        $people->computer = $computer;

        $service = new PeopleService();
//        $data = $service->find(1);
        $data = $service->findList(array('id = 1'));
//        var_dump($service->create($people));
        return new Response($data);
    }

    public function kafkaTestAction(){
        
    }

}