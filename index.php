<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

use Core\{Router, Request};

$router = Router::load('routes/routes.php');

$route = $router->direct(Request::uri(), Request::method());

?>