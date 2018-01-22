<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/11/6
 * Time: 16:11
 */
namespace Test\Service;

use BeePHP\Di\Di;
use BeePHP\Mvc\Service;
use Test\Model\People;

class PeopleService extends Service{

    protected $modelClass = People::class;

    function __construct(){
        $this->setDbAdapter(Di::getDynamic('dbAdapter'));
    }

}