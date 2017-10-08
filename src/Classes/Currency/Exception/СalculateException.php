<?php

namespace Classes\Currency\Exception;

class CalculateException extends \Exception {

    const NUM_ERROR = 500;

    public function __construct($message) {
        parent::__construct($message, NUM_ERROR);
    }

}