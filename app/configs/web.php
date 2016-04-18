<?php

return [
    'components' => [
        'router' => [
            'class' => '\Micro\Web\Router',
            'arguments' => [
                'routes' => [
                ]
            ]
        ],
        'auth' => [
            'class' => '\Micro\Auth\DbAcl',
            'arguments' => [
                'container' => '@this',
                'roles' => [ // Permission roles
                    'roles' => [
                        1 => 'user',
                        2 => 'admin'
                    ],
                    'perms' => [
                        1 => 'news_read',
                        2 => 'news_create',
                        3 => 'news_edit'
                    ],
                    'role_perms' => [
                        1 => [2, 3]
                    ]
                ]
            ]
        ],
        'cookie' => [
            'class' => '\Micro\Web\Cookie',
            'arguments' => [
                'request' => '@request'
            ]
        ],
        'session' => [
            'class' => '\Micro\Web\Session',
            'arguments' => [
                'request' => '@request',
                'autoStart' => true
            ]
        ],
        'user' => [
            'class' => '\Micro\Web\User',
            'arguments' => [
                'container' => '@this'
            ]
        ],
        'flash' => [
            'class' => '\Micro\Web\FlashMessage',
            'arguments' => [
                'session' => '@session'
            ]
        ]
    ]
];
