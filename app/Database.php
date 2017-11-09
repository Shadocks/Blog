<?php

namespace Core;


/**
 * Class Database
 * @package Core
 */
class Database
{
    /**
     * @var \PDO
     */
    private $_db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $config = require __DIR__ . './../config/db.php';
        $this->_db = $this->getConnection($config);
    }

    /**
     * @return \PDO
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * @param array $data
     * @return \PDO
     */
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
