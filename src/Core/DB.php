<?php declare(strict_types=1);

namespace Core;

abstract class DB
{
    protected $db;

    public function __construct()
    {
        
    }

    protected function runQuery($sql, $params = []) {
        if (empty($params)) {
            $result = $this->getDB()->query($sql);
        } else {
            $result = $this->getDB()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    private function getDB() {
        if ($this->db == null) {
            $this->db = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER, DB_PASS, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }

}