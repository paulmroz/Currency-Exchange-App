<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Interfaces\Controller;
use App\Services\CurrencyService;
use App\Services\ExchangeService;

class CurrencyController implements Controller {
    public function invoke()
    {
        $currencyObjectsArray = (new CurrencyService)->getCurrencyFromDb();

        $exchangeObjectsArray = (new ExchangeService)->getExchangesFromDb();

        require './views/currency.view.php';
    }
}