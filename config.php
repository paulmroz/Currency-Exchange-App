<?php
return  [
    'database' => [

        'name' => 'MYSQL_DATABASE',

        'username' => 'MYSQL_USER',

        'password' => 'MYSQL_PASSWORD',

        'connection' =>'mysql:host=127.0.0.1',

        'options' =>[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]

    ]
];

