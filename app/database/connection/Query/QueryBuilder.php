<?php

declare(strict_types=1);

namespace App\Connection\Query;

class Repository
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

}