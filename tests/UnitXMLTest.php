<?php

namespace tests;

use Classes\Currency\CountCurrency;
use Classes\Currency\Service\Fake;

class UnitXMLTest extends \PHPUnit_Framework_TestCase {

    private $countCurrency;

    protected function setUp() {
        $this->countCurrency = new CountCurrency(new Fake(['Австралийский доллар' => 45, 'Белорусский рубль' => 50, 'Болгарский лев' => 33, 'Датских крон' => 47]));
    }

    public function testAdd() {
        $result = $this->countCurrency->calculate(17, "Австралийский доллар", "Белорусский рубль");
        $result1 = $this->countCurrency->calculate(17, "Болгарский лев", "Датских крон");

        $this->assertEquals(15, round($result));
        $this->assertEquals(12, round($result1));
    }

    protected function tearDown() {
        $this->countCurrency = NULL;
    }

}