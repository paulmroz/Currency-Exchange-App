<?php

declare(strict_types=1);

namespace App\Services;
use App\Api\APIClient;
use App\Database\Repository\CurrencyRepository;
use App\Models\Currency;

class CurrencyService {
    public string $url = 'http://api.nbp.pl/api/exchangerates/tables/A/';

    public CurrencyRepository $currencyRepository;

    public function __construct()
    {
        $this->currencyRepository = new CurrencyRepository;
    }

    public function saveCurrencysInDb() {
        $apiResults = APIClient::getInstance($this->url)->callAPI();

        $currencyArray = $this->extractData($apiResults);

        $this->currencyRepository->save($currencyArray);
    }

    public function extractData($apiResults)
    {
        $currencyArray = json_decode($apiResults);

        return $currencyArray[0]->rates;
    }

    public function getCurrencyFromDb() {
        $dataArray = $this->currencyRepository->get();

        $currencyObjects = [];
        foreach ($dataArray as $data) {
            $currency = new Currency();
            $currency->id = $data['id'];
            $currency->currency = $data['currency'];
            $currency->code = $data['code'];
            $currency->mid = $data['mid'];
            
            $currencyObjects[] = $currency;
        }

        return $currencyObjects;
    }

}

