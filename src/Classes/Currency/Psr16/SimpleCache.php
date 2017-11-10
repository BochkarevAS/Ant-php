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

    public function readFile() {

        $data = $this->cache->get("key");

        if (!$data) {
            $data = $this->pool->readFile();
            $this->cache->set("key", $data,300);
        }
        return $data;

    }
}