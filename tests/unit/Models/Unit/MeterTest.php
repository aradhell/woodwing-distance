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

}
