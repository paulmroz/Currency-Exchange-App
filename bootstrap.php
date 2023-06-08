<?php

declare(strict_types=1);

use App\Services\CurrencyService;

(new CurrencyService())->saveCurrencysInDb();
