<?php

    namespace Classes\Currency\Daily;

    use Classes\Currency\Exception\AntException;

    class CbrXMLDaily {

        protected $valutes = [];

        public function __construct() {
            $rss = simplexml_load_file("https://www.cbr-xml-daily.ru/daily.xml");

            if ($rss === false) {
                throw new AntException("Файл не загружен!");
            }

            foreach ($rss as $el) {
                $this->valutes[strval($el->CharCode)] = strval($el->Value);
            }
        }

        public function getCurrency() {
            return $this->valutes;
        }

    }