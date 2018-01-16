<?php
namespace Test\Controllers;

use BeePHP\Mvc\Controller;
use BeePHP\Mvc\View;

class IndexController extends Controller{

    public function indexAction(){

        $view = new View();

        $view->assign("data", "hhhhhhhhhhhh");
        $view->render("index");

        return $view;
    }
}