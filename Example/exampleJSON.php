<?php

    use Classes\Currency\CountCurrency;
    use Classes\Currency\Service\CbrXMLDaily;

    $countCurrency = new CountCurrency(new CbrXMLDaily());

    $price = 17;
    $to = "Австралийский доллар";
    $from = "Австралийский доллар";

    $sum = round($countCurrency->calculate($price, $to, $from), 3);

    echo $sum;

