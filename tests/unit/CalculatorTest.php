<?php

namespace App;

use App\Models\Unit\Meter;
use App\Models\Unit\UnitTypes;
use App\Models\Unit\Yard;

class CalculatorTest extends \TestCase
{
    public function testCalculate(): void
    {
        $distances = array(
            new Meter(2),
            new Yard(4),
        );
        $result = Calculator::calculate($distances, UnitTypes::METER);
        $this->assertInstanceOf(Meter::class, $result);
    }

    public function testCalculateMeterYard(): void
    {
        $distances = array(
            new Meter(2),
            new Yard(4),
        );
        $result = Calculator::calculate($distances, UnitTypes::METER);
        $this->assertInstanceOf(Meter::class, $result);
        $this->assertEquals(5.6576, $result->getValue());
    }

    public function testCalculateYardYard(): void
    {
        $distances = array(
            new Yard(1.56),
            new Yard(5.96),
        );
        $result = Calculator::calculate($distances, UnitTypes::METER);
        $this->assertInstanceOf(Meter::class, $result);
        $this->assertEquals(6.876288, $result->getValue());
    }

    public function testCalculateMetreMetre(): void
    {
        $distances = array(
            new Meter(5),
            new Meter(6),
        );
        $result = Calculator::calculate($distances, UnitTypes::YARD);
        $this->assertInstanceOf(Yard::class, $result);
        $this->assertEquals(12.029746281714786, $result->getValue());
    }
}