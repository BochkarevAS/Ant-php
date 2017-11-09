<?php

namespace Classes\Currency\Psr16;

use Classes\Currency\Service\Reader;
use Psr\SimpleCache\CacheInterface;

class SimpleCache {

    private $pool;
    private $cache;

    public function __construct(Reader $pool, CacheInterface $cache) {
        $this->pool = $pool;
        $this->cache = $cache;
    }

    public function setCache() {
        $this->cache->set("key", $this->pool->readFile(), 300);
    }

    public function getCache() {
        if (!empty($this->pool->readFile())) {
            return $this->pool->readFile();
        }
        return null;
    }

}