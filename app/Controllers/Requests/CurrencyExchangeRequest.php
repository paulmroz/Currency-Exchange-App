<?php

declare(strict_types=1);

namespace App\Controllers\Requests;
use App\Controllers\Requests\Interfaces\Request;

class CurrencyExchangeRequest implements Request {
    public array $error = [];
    public string $currencyFrom;
    public string $currencyTo;
    public float $amount;
    public function validate()
    {
        $this->prepareForValidation();    

        if (null === $this->amount ) {
            $this->error = ['Input value cannot be empty!'];
        }

        return $this->error;
    }

    public function prepareForValidation()
    {
        $this->currencyFrom = htmlspecialchars($_POST['currency1']);
        $this->currencyTo = htmlspecialchars($_POST['currency2']);
        $this->amount = (float) htmlspecialchars($_POST['amount']);
    }
}