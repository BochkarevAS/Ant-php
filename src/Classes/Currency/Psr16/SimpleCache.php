<?php

namespace Classes\Currency\Psr16;

use Classes\Currency\Service\Reader;
use Psr\SimpleCache\CacheInterface;

class SimpleCache {

    private $pool;
    private $anotherPsr16class;

    public function __construct(Reader $pool, CacheInterface $anotherPsr16class) {
        $this->pool = $pool;
        $this->anotherPsr16class = $anotherPsr16class;
    }

}