<?php

declare(strict_types=1);

namespace App\Models;

class Currency {

    public const TABLE_NAME = 'currency';

    public string $id;
    public string $currency;
    public string $code;
    public string $mid;
}