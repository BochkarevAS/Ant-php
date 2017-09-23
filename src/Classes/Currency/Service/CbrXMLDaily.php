<?php

    namespace Classes\Currency\Service;

    use Classes\Currency\Exception\AntException;

    class CbrXMLDaily implements Reader {

        public function readFile() {
            $xml = simplexml_load_file("https://www.cbr-xml-daily.ru/daily.xml");
            $valutes = [];

            if ($xml === false) {
                throw new AntException("Сервер не отвечает или вернул пустой результат!");
            }

            foreach ($xml as $el) {
                $valutes[strval($el->Name)] = strval($el->Value);
            }

            return $valutes;
        }
    }