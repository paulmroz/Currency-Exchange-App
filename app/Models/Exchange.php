<?php

declare(strict_types=1);

namespace App\Models;

class Exchange {
    public string $id;

    public string $idCurrencyFrom;

    public string $idCurrencyTo;

    public float $amount;

    public float $result;

    public string $currencyFromCurrency;
    public string $currencyFromCode;
    public float $currencyFromMid;
    public string $currencyToCurrency;
    public string $currencyToCode;
    public float $currencyToMid;
}