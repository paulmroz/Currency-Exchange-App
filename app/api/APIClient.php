<?php 

declare(strict_types=1);

namespace App\Api;

class APIClient {
    private static $instance;
    private $url;

    private function __construct($url) {
        $this->url = $url;
    }

    public static function getInstance($url) {
        if (!self::$instance) {
            self::$instance = new self($url);
        }
        return self::$instance;
    }

    public function callAPI() {
        
        $curl = curl_init($this->url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
        
        } else {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($httpCode === 200) {
              
            } else {
                
            }
        }

        curl_close($curl);
        
        return $response;
    }
}