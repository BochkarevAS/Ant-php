<?php

namespace tests;

use Classes\Currency\Exception\AntException;
use Classes\Currency\Service\CbrXMLDaily;

class CbrXMLDailyTest extends \PHPUnit_Framework_TestCase {

    private $cbrXMLDaily;

    protected function setUp() {
        $this->cbrXMLDaily = new CbrXMLDaily();
    }

    // Я здесь думал заебенить проверку на массив но тут вариантов много пока так...
    public function testReadFile() {
        try {
            $result = $this->cbrXMLDaily->readFile();
            $this->assertNotTrue($result,"Проблемы с сервером XML");
        } catch (AntException $e) {
            $this->markTestSkipped('Этот тест был пропущен из за проблем с сервером XML!');
        }

    }

    protected function tearDown() {
        $this->cbrXMLDaily = NULL;
    }

}