<?php declare(strict_types=1);

$routes = [
    '*' => [
        'user/signup'       =>
        [
            'controller'    => 'UserController',
            'template'      => 'template-index'
        ],
        'user/signin'       => 'UserController',
    ],
    'GET' => [
        '/'                 =>
        [
            'controller'    => 'IndexController',
            'template'      => 'template-index'
        ],
        'user/index'        => 'UserController',
        'user/logout'       => 'UserController',
    ],
    'POST' => [
    ],
    'PUT' => [
    ],
    'DELETE' => [
    ],
    'PATCH' => [
    ]
];
