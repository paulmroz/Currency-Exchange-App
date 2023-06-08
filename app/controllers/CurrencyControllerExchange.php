<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Interfaces\Controller;
use App\Services\ExchangeService;

class CurrencyControllerExchange implements Controller {
    public function invoke(){
        
        $result = (new ExchangeService)->exchange($_POST['currency1'], $_POST['currency2'], $_POST['amount']);

        require 'app/views/result.view.php';
    }
}