<?php

namespace Imaginarium;

class IndexModel extends MainModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsernameDetails()
    {
        // This should be communication with DB to get username details
        return [
            'id' => 1,
            'username' => 'Human'
        ];
    }
}
