<?php

namespace App\Models\Unit;

class YardTest extends \TestCase
{

    public function testCreateYard()
    {
        $yard = new Yard(5);

        $this->assertEquals(Yard::TYPE, $yard);
        $this->assertEquals(5, $yard->getValue());
        $this->assertEquals(4.5720, $yard->getValueInBaseUnit());
    }

    public function testCreateYardWithBaseUnitValue()
    {
        $yard = new Yard(10, true);

        $this->assertEquals(Yard::TYPE, $yard);
        $this->assertEquals(10.936132983377078, $yard->getValue());
        $this->assertEquals(10, $yard->getValueInBaseUnit());
    }

}
