<?php

    namespace Classes\Currency\Service;

    use Classes\Currency\Exception\AntException;

    class CbrXMLDaily implements Reader {

        public function readFile() {
            $rss = simplexml_load_file("https://www.cbr-xml-daily.ru/daily.xml");
            $valutes = [];

            if ($rss === false) {
                throw new AntException("Файл не загружен!");
            }

            foreach ($rss as $el) {
                $valutes[strval($el->Name)] = strval($el->Value);
            }

            return $valutes;
        }
    }