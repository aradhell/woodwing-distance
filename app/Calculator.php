<?php

namespace App;


use App\Models\Unit\UnitFactory;
use App\Models\Unit\UnitInterface;

class Calculator
{

    /**
     * Sums all distance values in base unit and creates a new unit in $outputUnit type with this total value.
     *
     * @param UnitInterface[] $distances
     * @param string $outputUnit
     * @return UnitInterface
     * @throws Exceptions\InvalidUnitException
     */
    public static function calculate(array $distances, string $outputUnit): UnitInterface
    {
        return UnitFactory::create($outputUnit, self::getSumValueInBaseUnit($distances), true);
    }

    /**
     * @param UnitInterface[] $distances
     * @return float
     */
    private static function getSumValueInBaseUnit(array $distances): float
    {
        $sum = 0;
        foreach($distances as $distance) {
            $sum += $distance->getValueInBaseUnit();
        }
        return $sum;
    }

}