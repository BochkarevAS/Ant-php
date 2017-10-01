<?php

namespace tests;

use Classes\Currency\CountCurrency;
use Classes\Currency\Service\CbrXMLDaily;

class UnitXMLTest extends \PHPUnit_Framework_TestCase {

    private $countCurrency;

    protected function setUp() {
        $this->countCurrency = new CountCurrency(new CbrXMLDaily());
    }

    public function testAdd() {
        $result = $this->countCurrency->calculate(17, "Австралийский доллар", "Австралийский доллар");
        $this->assertEquals(17, $result);
    }

    protected function tearDown() {
        $this->countCurrency = NULL;
    }

}