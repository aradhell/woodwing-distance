<?php

namespace App\Models\Unit;


abstract class AbstractUnit implements UnitInterface
{

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

    public function __construct(float $value, float $units, bool $inBaseUnit=false)
    {
        $this->value = ($inBaseUnit) ? $value/$units : $value;
        $this->units = $units;
        $this->valueInBaseUnit = $this->value * $units;
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

}