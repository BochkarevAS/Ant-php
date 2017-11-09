<?php

namespace Classes\Currency\Psr16;

use Classes\Currency\Service\Reader;

class SimpleCache {

    private $pool;
    private $anotherPsr16class;

    public function __construct(Reader $pool, AnotherPsr16class $anotherPsr16class) {
        $this->pool = $pool;
        $this->anotherPsr16class = $anotherPsr16class;
    }

    public function setCache() {
        $this->anotherPsr16class->set("key", $this->pool->readFile(), 300);


    }

    public function getCache() {

        if (!empty($this->pool->readFile())) {
            return $this->pool->readFile();
        }
        return null;
    }

}