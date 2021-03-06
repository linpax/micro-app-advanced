<?php

$params = array_replace_recursive(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    // Site name
    'company' => 'Micro',
    'slogan' => 'simply hmvc php framework',

    // Language
    'lang' => 'en',

    // Errors
    'errorController' => '\App\Controllers\DefaultController',
    'errorAction' => 'error',

    // Parameters
    'params' => $params,

    // Components
    'components' => [
        'logger' => [
            'class' => '\Micro\Base\Logger',
            'arguments' => [
                'loggers' => [
                    'file' => [
                        'class' => '\Micro\Loggers\DbLogger',
                        'levels' => 'notice, error, emergency, critical, alert, warning, info, debug',
                        'table' => 'logs'
                    ]
                ]
            ]
        ],
        'services' => [
            'class' => '\Micro\Queue\Queue',
            'arguments' => [
                'servers' => [
                    'server1' => [
                        'class' => '\Micro\Queue\RawQueue',
                        'ip' => '192.168.10.1',
                        'user' => 'name',
                        'pass' => 'word'
                    ],
                    'server2' => [
                        'class' => '\Micro\Queue\RedisQueue',
                        'ip' => '192.168.10.2',
                        'user' => 'name',
                        'pass' => 'word'
                    ],
                    'server3' => [
                        'class' => '\Micro\Queue\RedisQueue',
                        'ip' => '192.168.10.3',
                        'user' => 'name',
                        'pass' => 'word'
                    ],
                    'server4' => [
                        'class' => '\Micro\Queue\RabbitMqQueue',
                        'ip' => '192.168.10.4',
                        'user' => 'name',
                        'pass' => 'word'
                    ]
                ],
                'routes' => [
                    'pipeline.service' => 'server1',
                    'master.*' => [
                        'async' => ['server2'],
                        'server3'
                    ],
                    'broadcast.*' => [
                        'stream' => ['server4', 'server1'],
                        'sync' => 'server2'
                    ]
                ]
            ]
        ]
    ]
];
