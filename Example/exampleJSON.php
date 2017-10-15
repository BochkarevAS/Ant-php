<?php

use Classes\Currency\CountCurrency;
use Classes\Currency\Service\CbrXMLDaily;

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => 6379,
]);

$client = new Predis\Client('tcp://127.0.0.1:6379');

$client->set('message', 'Hello world');
$value = $client->get('message');
print($value);



$countCurrency = new CountCurrency(new CbrXMLDaily());

$price = 17;
$valute1 = "Австралийский доллар";
$valute2 = "Австралийский доллар";

$sum = round($countCurrency->calculate($price, $valute1, $valute2), 3);

echo $sum;

