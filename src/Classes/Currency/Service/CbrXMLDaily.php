<?php

    namespace Classes\Currency\Service;

    use Classes\Currency\Exception\AntException;

    class CbrXMLDaily implements Reader {

        private $valutes = [];

        public function readFile($filepath) {
            $rss = simplexml_load_file($filepath);

            if ($rss === false) {
                throw new AntException("Файл не загружен!");
            }

            foreach ($rss as $el) {
                $this->valutes[strval($el->Name)] = strval($el->Value);
            }

            return $this->valutes;
        }
    }