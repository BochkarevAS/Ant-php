<?php

    namespace Classes\Currency;

    use Classes\Currency\Exception\CalculateException;
    use Classes\Currency\Service\Reader;

    class CountCurrency {

        private $reader;

        public function __construct(Reader $reader) {
            $this->reader = $reader;
        }

        public function calculate(int $val, String $to, String $from): float {
            $valutes = $this->reader->readFile();

            if (empty($val) || $val < 0) {
                throw new CalculateException("Недопустимая цена!");
            }

            if (!isset($valutes[$to])) {
                throw new CalculateException("Введена не коректная валюта " . $to);
            }

            if (!isset($valutes[$from])) {
                throw new CalculateException("Введена не коректная валюта " . $from);
            }

            $rate1 = (int) $valutes[$to];
            $rate2 = (int) $valutes[$from];

            if ($from == 0) {
                throw new CalculateException("Деление на ноль не допустимо!");
            }

            return ($val * $rate1) / ($rate2);
        }
    }