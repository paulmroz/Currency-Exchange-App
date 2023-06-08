<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

use Core\{Router, Request};

$router = Router::load('routes/routes.php');

$route = $router->direct(Request::uri(), Request::method());

        // "psr-4" : {
        //     "App\\": "app/",
        //     "Core\\": "core/",
        //     "App\\Api\\": "app/api/",
        //     "App\\Services\\": "app/services/",
        //     "App\\Controllers\\": "app/controllers/",
        //     "App\\Controllers\\Interfaces\\": "app/controllers/interfaces",
        //     "App\\Database\\Connection\\": "app/database/connection",
        //     "App\\Database\\Repository\\AbstractRepository\\": "app/database/repository/abstractRepository",
        //     "App\\Database\\Repository\\": "app/database/repository"
        // },
?>