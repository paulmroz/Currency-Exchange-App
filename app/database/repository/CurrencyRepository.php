<?php

declare(strict_types=1);

namespace App\Database\Repository;

use App\Database\Repository\AbstractRepository\Repository;
use PDO;

class CurrencyRepository extends Repository {
    public function save($dataArray)
    {
        foreach ($dataArray as $data) {
            $currency = $data->currency;
            $code = $data->code;
            $mid = $data->mid;
        
            $stmt = $this->pdo->prepare("INSERT INTO currency (id, currency, code, mid) VALUES (?, ?, ?, ?) 
                                         ON DUPLICATE KEY UPDATE currency = ?, code = ?, mid = ?");
            
            $uuid = uniqid();
            $stmt->bindParam(1, $uuid);
            $stmt->bindParam(2, $currency);
            $stmt->bindParam(3, $code);
            $stmt->bindParam(4, $mid);
            $stmt->bindParam(5, $currency);
            $stmt->bindParam(6, $code);
            $stmt->bindParam(7, $mid);
        
            $stmt->execute();
        }
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM currency");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCode($code)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM currency WHERE code = :code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
