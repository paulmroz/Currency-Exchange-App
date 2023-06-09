<?php

declare(strict_types=1);

namespace App\Database\Repository\AbstractRepository;

use App\Database\Connection\MysqlConnection;
use PDO;

abstract class Repository
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = MysqlConnection::getInstance();
    }
}