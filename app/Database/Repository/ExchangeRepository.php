<?php

declare(strict_types=1);

namespace App\Database\Repository;

use App\Database\Repository\AbstractRepository\Repository;
use PDO;

class ExchangeRepository extends Repository {
    public function save(array $dataArray): void
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

    public function getAllWithCurrencies(): array
    {
        $stmt = $this->pdo->query("SELECT exchanges.*, 
                                            currency_from.currency AS currency_from_currency, 
                                            currency_from.code AS currency_from_code, 
                                            currency_from.mid AS currency_from_mid, 
                                            currency_to.currency AS currency_to_currency, 
                                            currency_to.code AS currency_to_code, 
                                            currency_to.mid AS currency_to_mid
                                    FROM exchanges
                                    LEFT JOIN currency AS currency_from ON exchanges.id_currency_from = currency_from.id
                                    LEFT JOIN currency AS currency_to ON exchanges.id_currency_to = currency_to.id");
                                                                        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveExchangeInDb(
        string $currencyFrom, 
        string $currencyTo, 
        string $amount, 
        float $result
    ): void {
        $stmt = $this->pdo->prepare("INSERT INTO exchanges (id, id_currency_from, id_currency_to , amount, result) VALUES (?, ?, ?, ?, ?)");
        
        $uuid = uniqid();
        $stmt->bindParam(1, $uuid);
        $stmt->bindParam(2, $currencyFrom['id']);
        $stmt->bindParam(3, $currencyTo['id']);
        $stmt->bindParam(4, $amount);
        $stmt->bindParam(5, $result);
    
        $stmt->execute();
    }
}
