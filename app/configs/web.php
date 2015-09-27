<?php

return [
    'components' => [
        'router' => [
            'class' => '\Micro\web\Router',
            'arguments' => [
                'routes' => [
                ]
            ]
        ],
        'auth' => [
            'class' => '\Micro\auth\DbAcl',
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
            'class' => '\Micro\web\Cookie',
            'arguments' => [
                'request' => '@request'
            ]
        ],
        'session' => [
            'class' => '\Micro\web\Session',
            'arguments' => [
                'request' => '@request',
                'autoStart' => true
            ]
        ],
        'user' => [
            'class' => '\Micro\web\User',
            'arguments' => [
                'container' => '@this'
            ]
        ],
        'flash' => [
            'class' => '\Micro\web\FlashMessage',
            'arguments' => [
                'session' => '@session'
            ]
        ]
    ]
];
