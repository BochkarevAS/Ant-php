<?php

    namespace Classes\Currency;

    use Classes\Currency\Service\API\Reader;

    class CountCurrency {

        private $valutes = [];
        private $reader;

        public function setReader(Reader $reader) {
            $this->reader = $reader;
        }

        public function getContent($filepath) {
            $this->valutes = $this->reader->readFile($filepath);
            return $this->valutes;
        }

        public function calculate(int $inp, String $beginCurrency, String $endCurrency) {

            if (empty($inp)) {
                return 0;
            }

            $val1 = (int) $this->valutes[$beginCurrency];
            $val2 = (int) $this->valutes[$endCurrency];

            return ($inp * $val1) / ($val2);
        }
    }