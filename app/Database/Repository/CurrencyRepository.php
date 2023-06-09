<?php

declare(strict_types=1);

namespace App\Database\Repository;

use App\Database\Repository\AbstractRepository\Repository;
use App\Models\Currency;
use PDO;

class CurrencyRepository extends Repository {
    public function save(array $dataArray): void
    {
        foreach ($dataArray as $data) {
            $currency = $data->currency;
            $code = $data->code;
            $mid = $data->mid;
        
            $stmt = $this->pdo->prepare("INSERT INTO " . Currency::TABLE_NAME . " (id, currency, code, mid) VALUES (?, ?, ?, ?) 
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

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM " . Currency::TABLE_NAME);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCode(string $code): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM " . Currency::TABLE_NAME . " WHERE code = :code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
