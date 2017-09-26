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
    private $_dataDb = [];
    private static $_instance;

    private function __construct()
    {
        $this->_dataDb = require __DIR__ . './../config/dataDb.php';
        $this->getConnection();
    }

    public function getConnection()
    {
        try {
           $this->_db = new \PDO(
                'mysql:host=' .
                $this->_dataDb['host'] . ';dbname=' .
                $this->_dataDb['db'] . ';charset=utf8',
                $this->_dataDb['user'],
                $this->_dataDb['password'],
                array(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION)
            );
        } catch ( \Exception $e) {
            die('<p><strong>Error : </strong>' . $e->getMessage() . '</p>');
        }

        return $this->_db;
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }
}