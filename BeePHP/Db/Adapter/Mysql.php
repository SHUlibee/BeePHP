<?php
/**
 * Created by PhpStorm.
 * User: libiying
 * Date: 2017/4/17
 * Time: 10:41
 */
namespace BeePHP\Db\Adapter;

use BeePHP\Config\Config;
use \BeePHP\Db\AdapterInterface;

class Mysql implements AdapterInterface{

    /**
     * @var \PDO
     */
    protected $pdo = null;

    /**
     * Mysql constructor.
     * @param $config Config
     * @throws \Exception
     */
    public function __construct(Config $config){

        $host = $config->get('host');
        $dbname = $config->get('dbname');
        $charset = $config->get('charset') ? $config->get('charset') : 'UTF8';
        $username = $config->get('username');
        $password = $config->get('password');

        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=' . $charset;
        $this->pdo = new \PDO($dsn, $username, $password);
    }

    /**
     * 执行增删改操作，返回影响条数或者对应id
     * @param string $sql
     * @param string $lastInsertId
     * @return int|string
     */
    public function execute($sql, $lastInsertId = null){
        if($lastInsertId){
            $this->pdo->exec($sql);
            return $this->pdo->lastInsertId();
        }
        return $this->pdo->exec($sql);
    }

    /**
     * 查询数据
     * @param $sql
     * @return mixed
     */
    public function query($sql){
//        echo $sql . "\n";
        $res = $this->pdo->query($sql, \PDO::FETCH_ASSOC);

        return $res->fetchAll();
    }
}