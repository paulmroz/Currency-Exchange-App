<?php

$router->get('', App\Controllers\MainController::class);
$router->get('test', App\Controllers\CurrencyController::class);

$router->post('test', App\Controllers\CurrencyControllerExchange::class);
