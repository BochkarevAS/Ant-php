<?php

namespace Classes\Currency\Service;

class Fake implements ReaderInterface {

    private $values;

    public function __construct($values) {
        $this->values = $values;
    }

    public  function readFile() {
        return $this->values;
    }
}