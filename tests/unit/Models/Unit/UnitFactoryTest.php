<?php

namespace App\Models\Unit;


use App\Exceptions\InvalidUnitException;

class UnitFactoryTest extends \TestCase
{

    public function testCreateYard(): void
    {
        $yard = UnitFactory::create(UnitTypes::YARD, 4, false);
        $this->assertInstanceOf(Yard::class, $yard);
        $this->assertEquals(4, $yard->getValue());
    }

    public function testCreateMeter(): void
    {
        $meter = UnitFactory::create(UnitTypes::METER, 5, false);
        $this->assertInstanceOf(Meter::class, $meter);
        $this->assertEquals(5, $meter->getValue());
    }

    public function testCreateYardWithBaseUnitValue(): void
    {
        $yard = UnitFactory::create(UnitTypes::YARD, 10, true);
        $this->assertInstanceOf(Yard::class, $yard);
        $this->assertEquals(10.936132983377078, $yard->getValue());
        $this->assertEquals(10, $yard->getValueInBaseUnit());
    }

    public function testThrowsExceptionOnInvalidUnitWithFactory(): void
    {
        $this->expectException(InvalidUnitException::class);
        UnitFactory::create( "invalid_unit", 4);
    }
}