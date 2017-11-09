<?php

namespace Classes\Currency\Psr16;

use Classes\Currency\Service\Reader;
use Psr\SimpleCache\CacheInterface;

class SimpleCache implements Reader {

    private $pool;
    private $cache;

    public function __construct(Reader $pool, CacheInterface $cache) {
        $this->pool = $pool;
        $this->cache = $cache;
    }

    public function setCache() {
        $this->cache->set("key", $this->pool->readFile(), 300);
    }

    public function readFile() {

        if (!empty($this->cache->get("key"))) {
            return $this->cache->get("key");
        }
        return null;
    }
}