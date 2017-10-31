<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/4/14
 * Time: 18:29
 */

namespace BeePHP\Db;


interface AdapterInterface{

    public function insert($data, $table);

    public function delete();

    public function update();

    public function query();

}