<?php

    namespace Classes\Currency;

    use Classes\Currency\Exception\CalculateException;
    use Classes\Currency\Service\Reader;

    class CountCurrency {

        private $reader;
        private $valutes;

        public function __construct(Reader $reader) {
            $this->reader = $reader;
        }

        function getValutes() {
            if ($this->valutes === null) {
                $this->valutes = $this->reader->readFile();
            }

            return $this->valutes;
        }

        public function calculate(int $val, String $valute1, String $valute2): float {
            $valutes = $this->getValutes();

            if (empty($val) || $val < 0) {
                throw new CalculateException("Недопустимая цена!");
            }

            if (!isset($valutes[$valute1])) {
                throw new CalculateException("Введена не коректная валюта " . $valute1);
            }

            if (!isset($valutes[$valute2])) {
                throw new CalculateException("Введена не коректная валюта " . $valute2);
            }

            $rate1 = (int) $valutes[$valute1];
            $rate2 = (int) $valutes[$valute2];

            if ($rate2 == 0) {
                throw new CalculateException("Деление на ноль не допустимо!");
            }

            return ($val * $rate1) / ($rate2);
        }
    }