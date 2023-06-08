<?php

declare(strict_types=1);

namespace Core;
use Exception;

class Router
{
    protected $routes = [

        'GET' => [],

        'POST' => []

    ];


    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }


    public static function load($file)
    {
        $router = new static;
        
        require $file;

        return $router;
    }

    public function direct($uri, $requestType)
    {
        try {
            if (array_key_exists($uri, $this->routes[$requestType])) {
                $controller = $this->routes[$requestType][$uri];

                if (is_string($controller)) {

                    $controller = new $controller();
                }
                
                return $controller->invoke();
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}