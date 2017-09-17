<?php

    namespace Classes\Currency\Service;

    use Classes\Currency\Exception\AntException;

    class JsonRates implements Reader {

        public function readFile() {
            $rss = json_decode(file_get_contents("https://www.cbr-xml-daily.ru/daily_json.js"), true);
            $valutes = [];

            if ($rss === false) {
                throw new AntException("Файл не загружен!");
            }

            foreach ($rss as $el) {

                if (gettype($el) !== 'string') {
                    foreach ($el as $item) {
                        $valutes[$item['Name']] = $item['Value'];
                    }
                }
            }
            return $valutes;
        }
    }