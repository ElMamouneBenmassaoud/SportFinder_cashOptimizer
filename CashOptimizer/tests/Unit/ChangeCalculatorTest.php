<?php

namespace Tests\Unit;


use App\Models\ChangeCalculator;

// Assurez-vous d'utiliser le bon espace de noms
use PHPUnit\Framework\TestCase;

class ChangeCalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp(): void {
        parent::setUp();
        $this->calculator = new ChangeCalculator();
    }

    public function testOptimizeChangeFor10Euros() {
        $this->assertEquals(['bills' => ['10' => 1, '5' => 0, '2' => 0]], $this->calculator->optimizeChange(10));
    }

    public function testOptimizeChangeFor11Euros() {
        $this->assertEquals(['bills' => ['10' => 0, '5' => 1, '2' => 3]], $this->calculator->optimizeChange(11));
    }

    public function testOptimizeChangeFor21Euros() {
        $this->assertEquals(['bills' => ['10' => 1, '5' => 1, '2' => 3]], $this->calculator->optimizeChange(21));
    }

    public function testOptimizeChangeFor23Euros() {
        $this->assertEquals(['bills' => ['10' => 1, '5' => 1, '2' => 4]], $this->calculator->optimizeChange(23));
    }

    public function testOptimizeChangeFor31Euros() {
        $this->assertEquals(['bills' => ['10' => 2, '5' => 1, '2' => 3]], $this->calculator->optimizeChange(31));
    }

    public function testOptimizeChangeFor900719925474098Number() {
        $this->assertEquals(['bills' => ['10' => 900719925474098, '5' => 1, '2' => 3]], $this->calculator->optimizeChange('9007199254740991'));
    }
}
