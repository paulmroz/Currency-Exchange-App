<?php

declare(strict_types=1);

namespace App\Connection\Database;

class Connection
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance($config)
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    $config['connection'] . ';dbname=' . $config['name'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );
            } catch (PDOException $e) {
                die('Could not connect.');
            }
        }
        
        return self::$instance;
    }
}