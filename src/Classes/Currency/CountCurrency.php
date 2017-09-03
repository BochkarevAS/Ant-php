<?php

    namespace Classes\Currency;

    class CountCurrency {

        private $rss;
        private $valutes = [];

        public function __construct() {
            $this->rss = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp?date_req=" . date("d/m/Y"));
        }

        public function getContent(String $val1, String $val2) {
            $this->calculate();

            $item1 = (int) $this->valutes[$val1];
            $item2 = (int) $this->valutes[$val2];

            if (!isset($item1) && !isset($item2)) {
                return "Такой валюты нет!!!";
            }

            return abs($item1 - $item2);
        }

        private function calculate() {
            foreach ($this->rss as $el) {
                $this->valutes[strval($el->CharCode)] = strval($el->Value);
            }
        }

    }

// Здесь оставил название ключей !!! Для теста.
//    Array ( [AUD] => 46,0846 [AZN] => 34,1303 [GBP] => 75,0138 [AMD] => 12,1455
//        [BYN] => 30,0885 [BGN] => 35,3158 [BRL] => 18,4450 [HUF] => 22,6285
//        [HKD] => 74,1850 [DKK] => 92,8639 [USD] => 58,0557 [EUR] => 68,9992
//        [INR] => 90,7759 [KZT] => 17,1755 [CAD] => 46,4966 [KGS] => 84,1631
//        [CNY] => 88,3837 [MDL] => 32,6156 [NOK] => 74,6160 [PLN] => 16,2494
//        [RON] => 15,0361 [XDR] => 82,0553 [SGD] => 42,8045 [TJS] => 65,9080
//        [TRY] => 16,8541 [TMT] => 16,6134 [UZS] => 13,8889 [UAH] => 22,5503
//        [CZK] => 26,5082 [SEK] => 72,8556 [CHF] => 60,4558 [ZAR] => 44,8262
//        [KRW] => 51,7571 [JPY] => 52,7491 )