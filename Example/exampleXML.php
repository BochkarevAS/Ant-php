<?php

use Classes\Currency\CountCurrency;
use Classes\Currency\Psr16\SimpleCache;
use Classes\Currency\Service\CbrXMLDaily;
use Symfony\Component\Cache\Simple\FilesystemCache;

$cache = new SimpleCache(new CbrXMLDaily(), new FilesystemCache());
$countCurrency = new CountCurrency($cache);

$price = 17;
$valute1 = "Австралийский доллар";
$valute2 = "Австралийский доллар";

$sum = round($countCurrency->calculate($price, $valute1, $valute2), 3);

echo $sum;