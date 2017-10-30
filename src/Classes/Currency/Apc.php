<?php

namespace Classes\Currency;

use Classes\Currency\Service\JsonRates as Adapter;

class Apc extends Adapter {

    public function __construct(Adapter $cache, $name) {
        parent::__construct($cache, 'collection:'.$name.':');
    }

    public function flush() {

        $reflection = new \ReflectionMethod($this->cache, 'APCuIterator');
        $reflection->setAccessible(true);
        $iterator = $reflection->invoke($this->cache, '/^'.preg_quote($this->prefix, '/').'/', \APC_ITER_KEY);
        $reflection = new \ReflectionMethod($this->cache, 'apcu_delete');
        $reflection->setAccessible(true);
        return $reflection->invoke($this->cache, $iterator);
    }

}