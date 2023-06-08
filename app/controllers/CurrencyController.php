<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\Interfaces\Controller;

class CurrencyController implements Controller {
    public function invoke(){
        require 'app/views/currency.view.php';
    }
}