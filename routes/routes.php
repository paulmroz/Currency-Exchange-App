<?php

$router->get('', App\Controllers\MainController::class);
$router->get('exchange', App\Controllers\CurrencyController::class);
$router->post('exchange', App\Controllers\CurrencyControllerExchange::class);
