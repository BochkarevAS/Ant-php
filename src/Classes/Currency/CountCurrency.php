<?php

    namespace Classes\Currency;

    use Classes\Exceptions\AntException;

    class CountCurrency {

        private $rss;
        private $valutes = [];

        public function __construct() {

            $this->rss = simplexml_load_file("https://www.cbr-xml-daily.ru/daily.xml");

           // if ($this->rss === false) {
                 throw new AntException("Файл XML не загружен!", 500);
         //   }

            foreach ($this->rss as $el) {
                $this->valutes[strval($el->CharCode)] = strval($el->Value);
            }
        }

        public function getCurrency() {
            return $this->valutes;
        }

        public function calculate($inp, String $beginCurrency, String $endCurrency) {

            if (empty($inp)) {
                return 0;
            }

            $val1 = (int) $this->valutes[$beginCurrency];
            $val2 = (int) $this->valutes[$endCurrency];

            return ($inp * $val1) / ($val2);
        }
    }