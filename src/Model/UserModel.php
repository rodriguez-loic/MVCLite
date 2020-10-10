<?php declare(strict_types=1);

namespace Model;

class UserModel extends \Spot\Entity
{
    protected static $table = 'users';

    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $created_at;

    public static function fields()
    {
        return [
            'id'            => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'username'      => ['type' => 'string', 'required' => true, 'unique' => 'users_username'],
            'password'      => ['type' => 'string', 'required' => true],
            'email'         => ['type' => 'string', 'required' => true],
            'created_at'    => ['type' => 'datetime', 'value' => new \DateTime()]
        ];
    }
}
