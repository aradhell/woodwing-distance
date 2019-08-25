<?php

namespace App\Models\Unit;

class MeterTest extends \TestCase
{

    public function testCreateMeter()
    {
        $meter = new Meter(5);
        $this->assertEquals(Meter::TYPE, $meter);
        $this->assertEquals(5, $meter->getValue());
        $this->assertEquals(5, $meter->getValueInBaseUnit());
    }

    public function testCreateMeterWithBaseUnitValue()
    {
        $meter = new Meter(10, true);

        $this->assertEquals(Meter::TYPE, $meter);
        $this->assertEquals(10, $meter->getValue());
        $this->assertEquals(10, $meter->getValueInBaseUnit());
    }

}
