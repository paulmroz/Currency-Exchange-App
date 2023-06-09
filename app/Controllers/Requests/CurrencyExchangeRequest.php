<?php

declare(strict_types=1);

namespace App\Controllers\Requests;
use App\Controllers\Requests\Interfaces\Request;

class CurrencyExchangeRequest implements Request{
    public function validate()
    {
        var_dump('test');
    }
}