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

        $this->currencyExchangeRequest->validate();
        
        $result = (new ExchangeService)->exchange($_POST['currency1'], $_POST['currency2'], $_POST['amount']);

        require './views/result.view.php';
    }
}