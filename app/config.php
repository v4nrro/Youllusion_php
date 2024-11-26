<?php
    return [
        'database' => [
            'name' => 'youllusionphp',
            'username' => 'root',
            'password' => '',
            'connection' => 'mysql:host=localhost',
            'options' => [
                PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
                PDO::ATTR_PERSISTENT => true
             ]
        ],
        'routes' => [
            'filename' => 'routes.php'
        ],
        'project' => [
            'namespace' => 'youllusion'
        ],
        'security' => [
            'roles' => [
                'ROLE_ADMIN' => 3,
                'ROLE_USER' => 2,
                'ROLE_ANONYMOUS' => 1
            ]
        ]
    ];   