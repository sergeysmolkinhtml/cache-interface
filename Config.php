<?php

declare(strict_types=1);
namespace Main\UniqueSymbols;

use Exception;
use Predis\Client;


require "vendor/autoload.php";

try {
    echo "Output: " . (new FindValue(new CacheClass(new Client()), new UniqueSymbolsClass(),'44rrrrrw'))->findOrCompute() . "\r\n";
} catch (Exception $e) {
}


