<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Interfaces\Controller;
use App\Services\CurrencyService;

class MainController implements Controller {
    public function invoke()
    {
        $currencyObjectsArray = (new CurrencyService)->getCurrencyFromDb();
        
        require './views/index.view.php';
    }
}