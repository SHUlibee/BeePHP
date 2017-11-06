<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/4/14
 * Time: 18:29
 */

namespace BeePHP\Db;


interface AdapterInterface{

    public function execute($sql, $lastInsertId = null);

    public function query($sql);

}