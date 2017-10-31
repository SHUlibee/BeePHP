<?php

/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/4/17
 * Time: 10:41
 */

use \BeePHP\Db\Pdo;
use \BeePHP\Db\AdapterInterface;

class Mysql extends Pdo implements AdapterInterface{

    /**
     * @var PDO
     */
    protected $pdo = null;

    public function __construct($config){

        if(!isset($config['host'])){
            throw new Exception('host');
        }
        if(!isset($config['dbname'])){
            throw new Exception('dbname');
        }

        $host = $config['host'];
        $dbname = $config['dbname'];
        $charset = isset($config['charset']) ? $config['charset'] : 'UTF8';
        $username = $config['username'];
        $password = $config['password'];

        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=' . $charset;
        $this->pdo = new \PDO($dsn, $username, $password);
    }

    /**
     * @return mixed
     */
    public function insert($data, $table){

        

    }

    /**
     * @return mixed
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return mixed
     */
    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * @return mixed
     */
    public function query()
    {
        // TODO: Implement query() method.
    }
}