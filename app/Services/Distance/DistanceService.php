<?php

namespace App\Services\Distance;


use App\Calculator;
use App\Models\Unit\UnitFactory;

/**
 * Class DistanceService
 * @package App\Services\Distance
 */
class DistanceService
{


    /**
     * @param GetDistanceInput $getDistanceInput
     * @return GetDistanceOutput
     * @throws \App\Exceptions\InvalidUnitException
     */
    public function getDistance(GetDistanceInput $getDistanceInput): GetDistanceOutput
    {

        $distancesToCalculate = [];

        foreach ($getDistanceInput->getDistances() as $distance) {
            $distancesToCalculate[] = UnitFactory::create($distance['unit'], $distance['value']);
        }

        $finalUnit = Calculator::calculate($distancesToCalculate, $getDistanceInput->getOutputUnit());

        $value = ($getDistanceInput->isAbsolute()) ? abs($finalUnit->getValue()) : $finalUnit->getValue();
        $value = $this->applyPrecision($value, $getDistanceInput->getPrecision());

        return new GetDistanceOutput($value, $finalUnit, $getDistanceInput->getPrecision());
    }

    private function applyPrecision(float $value, int $precision): float
    {
        return number_format((float) $value, $precision, '.', '');
    }

}