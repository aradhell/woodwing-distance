<?php

namespace App\Models\Unit;


use App\Exceptions\InvalidUnitException;

class UnitFactory
{

    public static function create(string $unit, float $value=0.00, bool $inBaseUnit=false): UnitInterface
    {
        switch($unit) {
            case UnitTypes::METER:
                return new Meter($value, $inBaseUnit);
                break;
            case UnitTypes::YARD:
                return new Yard($value, $inBaseUnit);
                break;
            default:
                throw new InvalidUnitException;
        }
    }

}