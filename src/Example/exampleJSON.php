<?php

    use Classes\Currency\CountCurrency;
    use Classes\Currency\Service\CbrXMLDaily;

    $countCurrency = new CountCurrency(new CbrXMLDaily());

    $price = 17;
    $begin = "Австралийский доллар";
    $end = "Австралийский доллар";

    $sum = round($countCurrency->calculate($price, $begin, $end), 3);

    echo $sum;

