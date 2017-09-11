<?php

    namespace Classes\Currency;

    use Classes\Currency\Daily\CbrXMLDaily;

    class CountCurrency extends CbrXMLDaily {

        public function __construct() {
            parent::__construct();
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