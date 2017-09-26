<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 24/09/2017
 * Time: 18:50
 */

namespace Core;


class Database
{
    private $_db;

    public function __construct()
    {
        $config = require __DIR__ . './../config/dataDb.php';
        $this->_db = $this->getConnection($config);
    }

    public function getDb()
    {
        return $this->_db;
    }

    public function getConnection(array $data)
    {
        try {
           return new \PDO(
                'mysql:host=' .
                $data['host'] . ';dbname=' .
                $data['db'] . ';charset=utf8',
                $data['user'],
                $data['password'],
                array(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION)
            );
        } catch ( \Exception $e) {
            die('<p><strong>Error : </strong>' . $e->getMessage() . '</p>');
        }
    }
}