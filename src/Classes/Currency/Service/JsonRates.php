<?php

namespace Classes\Currency\Service;

use Classes\Currency\Exception\AntException;

class JsonRates implements Reader, KeyValueStore {

    protected $cache;
    protected $prefix;

    public function __construct(KeyValueStore $cache, $prefix) {
        $this->cache = $cache;
        $this->prefix = $prefix;
    }

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

    public function set($key, $value, $expire = 0) {
        $key = $this->prefix.$key;
        return $this->cache->set($key, func_get_arg(1), $expire);
    }

    public function get($key, &$token = null) {
        $key = $this->prefix.$key;
        return $this->cache->get($key, $token);
    }

}