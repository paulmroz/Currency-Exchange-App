<?php

declare(strict_types=1);

namespace App\Database\Connection;

use PDO;
use PDOException;

class MysqlConnection
{
    private static $instance = null;
    private array $config;

    private function __construct()
    {
        $this->config = require_once __DIR__ . '/../../../config.php';
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $instance = new self();
            
            try {
                $connectionString = $instance->config['database']['connection'] . ';dbname=' . $instance->config['database']['name'];
                $username = $instance->config['database']['username'];
                $password = $instance->config['database']['password'];
                $options = $instance->config['database']['options'];

                self::$instance = new PDO($connectionString, $username, $password, $options);
            } catch (PDOException $e) {
                die('Could not connect.');
            }
        }

        return self::$instance;
    }
}