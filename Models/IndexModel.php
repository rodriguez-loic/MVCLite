<?php

namespace Models;

class IndexModel extends MainModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsernameDetails()
    {
        $sql = '
            SELECT *
            FROM users
            WHERE id = 1
        ';

        $userDetails = $this->runQuery($sql);
        if ($userDetails->rowCount() == 1)
          return $userDetails->fetch();
        else
          throw new Exception("No user found for ID '$idBillet'");
    }
}