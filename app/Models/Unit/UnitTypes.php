<?php

namespace App\Models\Unit;


class UnitTypes
{
    const METER = "Meter";
    const YARD = "Yard";
    public static $availableUnits = array(self::METER, self::YARD);

}