<?php

namespace App\Models\Unit;


class Meter extends AbstractUnit
{

    const TYPE = UnitTypes::METER;
    const UNIT_IN_BASE_TYPE = 1; //1 meter = 1 meter

    public function __construct(float $value=0.00, bool $inBaseUnit=false)
    {
        parent::__construct($value, self::UNIT_IN_BASE_TYPE, $inBaseUnit);
    }

    public function __toString()
    {
        return self::TYPE;
    }

}