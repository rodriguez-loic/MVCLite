<?php

namespace Models;

abstract class MainModel
{
    private $db;

    public function __construct()
    {
    }

    protected function runQuery($sql, $params = null) {
        if ($params == null) {
            $result = $this->getDB()->query($sql);
        }
        else {
            $result = $this->getDB()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    private function getDB() {
        if ($this->db == null) {
            $this->db = new \PDO('mysql:host=localhost;dbname=imaginarium;charset=utf8',
            'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }

}