<?php

    namespace Classes\Currency;

    use Classes\Currency\Exception\CalculateException;
    use Classes\Currency\Service\Reader;

    class CountCurrency {

        private $reader;

        public function __construct(Reader $reader) {
            $this->reader = $reader;
        }

        public function calculate(int $inp, String $begin, String $end): float {
            $valutes = $this->reader->readFile();

            $val1 = (int) $valutes[$begin];
            $val2 = (int) $valutes[$end];

            if (empty($inp)) {
                throw new CalculateException("Ошибка вычесления!");
            }

            if (!is_numeric($val1) && !is_numeric($val2)) {
                throw new CalculateException("Ошибка вычесления!");
            }

            if ($val2 == 0) {
                throw new CalculateException("Ошибка вычесления!");
            }

            return ($inp * $val1) / ($val2);
        }
    }