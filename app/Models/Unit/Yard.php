<?php

namespace App\Models\Unit;


class Yard extends AbstractUnit
{

    const TYPE = UnitTypes::YARD;
    const UNIT_IN_BASE_TYPE = 0.9144; //1 yard = 0.9144 meter

    public function __construct(float $value=0.00, bool $inBaseUnit=false)
    {
        parent::__construct($value, self::UNIT_IN_BASE_TYPE, $inBaseUnit);
    }

    public function __toString()
    {
        return self::TYPE;
    }

}