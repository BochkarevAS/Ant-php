<?php

    namespace Classes\Currency;

    use Classes\Currency\Service\Reader;

    class CountCurrency {

        private $valutes = [];
        private $reader;

        public function __construct(Reader $reader) {
            $this->reader = $reader;
        }

        public function getContent(): array {
            $this->valutes = $this->reader->readFile();
            return $this->valutes;
        }

        public function calculate(int $inp, String $begin, String $end): float {

            if (empty($inp)) {
                return 0;
            }

            $val1 = (int) $this->valutes[$begin];
            $val2 = (int) $this->valutes[$end];

            return ($inp * $val1) / ($val2);
        }
    }