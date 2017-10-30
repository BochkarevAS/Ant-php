<?php

use Classes\Currency\CountCurrency;
use Classes\Currency\Psr16\SimpleCache;
use Classes\Currency\Service\CbrXMLDaily;


$cache = new SimpleCache(new CbrXMLDaily());

$countCurrency = new CountCurrency(new CbrXMLDaily());





$price = 17;
$valute1 = "Австралийский доллар";
$valute2 = "Австралийский доллар";

$sum = round($countCurrency->calculate($price, $valute1, $valute2), 3);

echo $sum;

