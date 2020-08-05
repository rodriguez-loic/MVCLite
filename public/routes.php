<?php declare(strict_types=1);

$routes = [
    '*' => [
        '/' => 'IndexController',
    ],
    'GET' => [
        'test' => 'Test\SubnamespaceController'
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
