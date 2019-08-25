<?php

namespace App\Models\Unit;


class Meter
{

    const TYPE = UnitTypes::METER;
    const UNIT_IN_BASE_TYPE = 1; //1 meter = 1 meter
    /**
     * @var float
     */
    private $value;
    /**
     * @var float $units The value of base unit needed to make up 1 this unit.
     */
    private $units;
    /**
     * @var float $valueInBase The value of unit in base unit
     */
    private $valueInBaseUnit;

    public function __construct(float $value)
    {
        $this->units = self::UNIT_IN_BASE_TYPE;
        $this->value = $value;
        $this->valueInBaseUnit = $value * $this->units;
    }
    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
    /**
     * @return float
     */
    public function getValueInBaseUnit(): float
    {
        return $this->valueInBaseUnit;
    }

    public function __toString()
    {
        return self::TYPE;
    }

}