<?php

namespace Tests\Unit;


use App\Models\ChangeCalculator;
use PHPUnit\Framework\TestCase;

class ChangeCalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp(): void {
        parent::setUp();
        $this->calculator = new ChangeCalculator();
    }

// test for 1€
    public function testOptimizeChangeFor1Euro() {
        // On s'attend à recevoir un message d'erreur pour 1 euro
        $expectedResult = ['error' => "Impossible de rendre la monnaie pour 1 €", 'bills' => []];
        $this->assertEquals($expectedResult, $this->calculator->optimizeChange(1));
    }

// test for 10€
    public function testOptimizeChangeFor10Euros() {
        $this->assertEquals(['bills' => ['10' => 1, '5' => 0, '2' => 0]], $this->calculator->optimizeChange(10));
    }

// test for 11€
    public function testOptimizeChangeFor11Euros() {
        $this->assertEquals(['bills' => ['10' => 0, '5' => 1, '2' => 3]], $this->calculator->optimizeChange(11));
    }

// test for 21€
    public function testOptimizeChangeFor21Euros() {
        $this->assertEquals(['bills' => ['10' => 1, '5' => 1, '2' => 3]], $this->calculator->optimizeChange(21));
    }
// test for 23€
    public function testOptimizeChangeFor23Euros() {
        $this->assertEquals(['bills' => ['10' => 1, '5' => 1, '2' => 4]], $this->calculator->optimizeChange(23));
    }

// test for 31€
    public function testOptimizeChangeFor31Euros() {
        $this->assertEquals(['bills' => ['10' => 2, '5' => 1, '2' => 3]], $this->calculator->optimizeChange(31));
    }

// test for 9007199254740991€
    public function testOptimizeChangeFor9007199254740991Number() {
        $this->assertEquals(['bills' => ['10' => 900719925474098, '5' => 1, '2' => 3]], $this->calculator->optimizeChange(9007199254740991));
    }
}
