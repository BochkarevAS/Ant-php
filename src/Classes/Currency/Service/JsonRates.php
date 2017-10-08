<?php

namespace Classes\Currency\Service;

use Classes\Currency\Exception\AntException;

class JsonRates implements Reader {

    public function readFile() {
        $json = json_decode(file_get_contents("https://www.cbr-xml-daily.ru/daily_json.js"), true);
        $valutes = [];

        if ($json === false) {
            throw new AntException("Сервер не отвечает или вернул пустой результат!");
        }

        foreach ($json as $el) {

            if (!is_string($el)) {
                foreach ($el as $item) {
                    $valutes[$item['Name']] = $item['Value'];
                }
            }
        }
        return $valutes;
    }
}