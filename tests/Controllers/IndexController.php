<?php
namespace Test\Controllers;

use BeePHP\Mvc\Controller;

class IndexController extends Controller{
    public function __construct(){

    }

    public function indexAction(){
        $this->view->render("index");
    }
}