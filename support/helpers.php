<?php

declare(strict_types=1);

if (!function_exists('dd')) {
    function dd($a) {

        var_dump($a);

        die(1);
    }
}