<?php
namespace Test\Controllers;

use BeePHP\Mvc\Controller;
use Test\Model\ComputerModel;
use Test\Model\PeopleModel;

class HttpController extends Controller{
    public function __construct(){
    }

    public function viewAction(){

        var_dump($this->request->getParams());
        $this->view->render("");

        $people = new PeopleModel();
        $computer = new ComputerModel();
        $computer->cpu = 'i5 6400';
        $computer->brand = 'iphone';
        
        $people->name = 'libiying';
        $people->computer = $computer;
        
        var_dump($people->computer);
    }

    public function kafkaTestAction(){
        
    }

}