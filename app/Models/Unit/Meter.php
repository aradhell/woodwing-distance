<?php

namespace App\Models\Unit;


class Meter extends AbstractUnit
{

    const TYPE = UnitTypes::METER;
    const UNIT_IN_BASE_TYPE = 1; //1 meter = 1 meter

    public function __construct(float $value=0.00)
    {
        parent::__construct($value, self::UNIT_IN_BASE_TYPE);
    }

    public function __toString()
    {
        return self::TYPE;
    }

}