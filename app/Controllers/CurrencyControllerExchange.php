<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Interfaces\Controller;
use App\Controllers\Requests\CurrencyExchangeRequest;
use App\Services\ExchangeService;

class CurrencyControllerExchange implements Controller {
    public CurrencyExchangeRequest $currencyExchangeRequest;
    public function __construct() {
        $this->currencyExchangeRequest = new CurrencyExchangeRequest();
    }
    public function invoke() 
    {
        $error = $this->currencyExchangeRequest->validate() ?? [];
      
        $result = (new ExchangeService)->exchange(
            $this->currencyExchangeRequest->currencyFrom,
            $this->currencyExchangeRequest->currencyTo,
            $this->currencyExchangeRequest->amount
        );

        require './views/result.view.php';
    }
}