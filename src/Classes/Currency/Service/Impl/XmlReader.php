<?php

    namespace Classes\Currency\Service\Impl;

    use Classes\Currency\Exception\AntException;
    use Classes\Currency\Service\API\Reader;

    class XmlReader implements Reader {

        private $valutes = [];

        public function readFile($filepath) {
            $rss = simplexml_load_file($filepath);

            if ($rss === false) {
                throw new AntException("Файл не загружен!");
            }

            foreach ($rss as $el) {
                $this->valutes[strval($el->CharCode)] = strval($el->Value);
            }

            return $this->valutes;
        }
    }