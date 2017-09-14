<?php

    namespace Classes\Currency\Service;

    class JsonRates implements Reader {

        private $valutes = [];

        public function readFile($filepath) {
            $rss = json_decode(file_get_contents($filepath), true);

            if ($rss === false) {
                throw new AntException("Файл не загружен!");
            }

            foreach ($rss as $el) {

                if (gettype($el) !== 'string') {
                    foreach ($el as $item) {
                        $this->valutes[$item['Name']] = $item['Value'];
                    }
                }
            }
            return $this->valutes;
        }
    }