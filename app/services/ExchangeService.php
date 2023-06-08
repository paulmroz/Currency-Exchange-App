<?php

declare(strict_types=1);

namespace App\Services;
use App\Database\Repository\CurrencyRepository;
use App\Database\Repository\ExchangeRepository;
use App\Models\Exchange;

class ExchangeService {

    public CurrencyRepository $currencyRepository;
    public ExchangeRepository $exchangeRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository;
        $this->exchangeRepository = new ExchangeRepository;
    }

    public function exchange($from, $to, $amount)
    {
        $currencyFrom = $this->currencyRepository->getByCode($from);
        $currencyTo = $this->currencyRepository->getByCode($to);
            
        $result = (int) $amount * ( (float) $currencyFrom[0]['mid'] / (float) $currencyTo[0]['mid']);

        $this->exchangeRepository->saveExchangeInDb($currencyFrom[0], $currencyTo[0], $amount, $result);
        
        return round($result, 2);
    }

    public function getExchangesFromDb() {
        $dataArray = $this->exchangeRepository->getAllWithCurrencies();
        
        $currencyObjects = [];
        foreach ($dataArray as $data) {
            $currency = new Exchange();
            $currency->id = $data['id'];
            $currency->id_currency_from = $data['id_currency_from'];
            $currency->id_currency_to = $data['id_currency_to'];
            $currency->amount = (float) $data['amount'];
            $currency->result = (float) $data['result'];
            $currency->currency_from_currency = $data['currency_from_currency'];
            $currency->currency_from_code = $data['currency_from_code'];
            $currency->currency_from_mid = (float) $data['currency_from_mid'];
            $currency->currency_to_currency = $data['currency_to_currency'];
            $currency->currency_to_code = $data['currency_to_code'];
            $currency->currency_to_mid = (float) $data['currency_to_mid'];
            
            $currencyObjects[] = $currency;
        }

        return $currencyObjects;
    }

}

   