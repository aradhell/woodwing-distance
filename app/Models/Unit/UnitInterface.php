<?php


namespace App\Models\Unit;


interface UnitInterface
{
    public function getValueInBaseUnit(): float;
    public function getValue(): float;
}