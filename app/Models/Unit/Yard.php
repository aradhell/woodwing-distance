<?php

namespace App\Models\Unit;


class Yard extends AbstractUnit
{

    const TYPE = UnitTypes::YARD;
    const UNIT_IN_BASE_TYPE = 0.9144; //1 yard = 0.9144 meter

    public function __construct(float $value=0.00)
    {
        parent::__construct($value, self::UNIT_IN_BASE_TYPE);
    }

    public function __toString()
    {
        return self::TYPE;
    }

}