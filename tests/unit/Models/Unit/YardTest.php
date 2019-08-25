<?php

namespace App\Models\Unit;

class YardTest extends \TestCase
{

    public function testCreateYard()
    {
        $meter = new Yard(5);
        $this->assertEquals(Yard::TYPE, $meter);
        $this->assertEquals(5, $meter->getValue());
        $this->assertEquals(4.5720, $meter->getValueInBaseUnit());
    }

}
