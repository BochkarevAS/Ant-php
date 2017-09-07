<?php

    namespace Classes\Exceptions;

    use Exception;

    class AntException extends Exception {

        const INVALIDID = 500;

        public function __construct($message, $code) {
            parent::__construct($message, $code);
        }

    }