<?php

declare(strict_types=1);

namespace App\Controllers\Requests\Interfaces;

interface Request {
    public function validate();
}