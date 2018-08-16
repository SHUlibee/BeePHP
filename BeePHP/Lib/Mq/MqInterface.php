<?php

namespace BeePHP\Lib;


interface MqInterface{

    public function pull();

    public function push();

}