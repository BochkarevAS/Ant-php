<?php

    namespace Classes\Currency;

    class CountCurrency {

        private $rss;
        private $valutes = [];

        public function __construct() {
            $this->rss = simplexml_load_file("https://www.cbr-xml-daily.ru/daily.xml");

            if ($this->rss === false) {
                return;
            }

            foreach ($this->rss as $el) {
                $this->valutes[strval($el->CharCode)] = strval($el->Value);
            }
        }

        public function getCurrency() {
            return $this->valutes;
        }

        public function calculate($beginInp, $endInp, String $beginCurrency, String $endCurrency) {

            if (empty($beginInp) || empty($endInp)) {
                return 0;
            }

            $val1 = (int) $this->valutes[$beginCurrency];
            $val2 = (int) $this->valutes[$endCurrency];

            return ($beginInp * $val1) / ($endInp * $val2);
        }
    }