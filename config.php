<?php

return  [
    'database' => [

        'name' => 'MYSQL_DATABASE',

        'username' => 'MYSQL_USER',

        'password' => 'MYSQL_PASSWORD',

        'connection' =>'mysql:host=db',

        'options' =>[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]

    ]
];

