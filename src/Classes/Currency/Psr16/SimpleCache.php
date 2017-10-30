<?php

namespace Classes\Currency\Psr16;

use Classes\Currency\Service\JsonRates;
use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\DateInterval;

class SimpleCache implements CacheInterface {

    private $pool;

    public function __construct(JsonRates $pool) {
        $this->pool = $pool;
    }

    public function get($key, $default = null) {

        if (!empty($this->pool->readFile())) {
            return $this->pool->readFile();
        }
        return null;
    }

    public function set($key, $value, $ttl = null) {
        $item = $this->pool->getItem($key)->set($value);
        if (null !== $ttl) {
            $item->expiresAfter($ttl);
        }
        return $this->pool->save($item);
    }

    public function delete($key) {
    }

    public function clear() {
    }

    public function getMultiple($keys, $default = null) {
    }

    public function setMultiple($values, $ttl = null) {
    }

    public function deleteMultiple($keys) {
    }

    public function has($key) {
    }
}