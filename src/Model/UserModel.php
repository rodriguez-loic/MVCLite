<?php declare(strict_types=1);

namespace Model;

use Core\DB;

class UserModel extends DB
{
    public $table = 'users';

    public $id;
    public $username;

    public function __construct($id)
    {
        parent::__construct();

        $sql = '
            SELECT *
            FROM ' . $this->table . '
            WHERE id = ?
        ';

        $userDetails =  $this->runQuery($sql, [$id]);

        if ($userDetails->rowCount() == 1) {
            $result = $userDetails->fetch();
            $this->id = $result['id'];
            $this->username = $result['username'];
        } else {
          throw new Exception("No user found for ID '$id'");
        }
    }
}