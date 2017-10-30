<?php

namespace Classes\Currency\Service;

interface KeyValueStore {

    public function get($key, &$token = null);

    public function set($key, $value, $expire = 0);

//    public function getMulti(array $keys, array &$tokens = null);
//
//    public function setMulti(array $items, $expire = 0);
//
//    public function delete($key);
//
//    public function deleteMulti(array $keys);
//
//    public function add($key, $value, $expire = 0);
//
//    public function replace($key, $value, $expire = 0);
//
//    public function decrement($key, $offset = 1, $initial = 0, $expire = 0);
//
//    public function touch($key, $expire);
//
//    public function flush();
//
//    public function getCollection($name);
}