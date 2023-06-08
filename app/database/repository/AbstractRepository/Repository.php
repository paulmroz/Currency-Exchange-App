<?php

declare(strict_types=1);

namespace App\Database\Repository\AbstractRepository;

use App\Database\Connection\MysqlConnection;
use Exception;
use PDO;

abstract class Repository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = MysqlConnection::getInstance();
    }

    public function selectAll($table)
    {
        $statement=$this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',

            $table,

            implode(', ', array_keys($parameters)),

            ':'. implode(', :', array_keys($parameters))

        );
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops, something went wrong.');
        }
    }



    public function delete($table)
    {
        try {
            $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE id = :id");
            $statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
            $statement->execute();
        } catch (Exception $e) {
            die('Whoops, somethinh went wrong');
        }
    }

}