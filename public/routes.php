<?php declare(strict_types=1);

$routes = [
    '*' => [
        '/' => [
            'controller' => 'IndexController',
            'template' => 'template-index'
        ]
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
