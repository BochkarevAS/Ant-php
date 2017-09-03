<?php

    require_once __DIR__ . '/vendor/autoload.php';

    use Classes\Currency\CountCurrency;

    $countCurrency = new CountCurrency();

    echo $countCurrency->getContent("AUD", "GBP"); // Например [AUD] => 46,0846 [AZN] => 34,1303




