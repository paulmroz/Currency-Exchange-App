<?php

declare(strict_types=1);

namespace App\Models;

class Exchange {
    public string $id;

    public string $id_currency_from;

    public string $id_currency_to;

    public float $amount;

    public float $result;

    public string $currency_from_currency;
    public string $currency_from_code;
    public float $currency_from_mid;
    public string $currency_to_currency;
    public string $currency_to_code;
    public float $currency_to_mid;
}