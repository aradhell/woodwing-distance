<?php

namespace App\Services\Distance;


class GetDistanceOutput
{

    private $value;
    private $unit;
    private $precision;

    public function __construct(float $value, string $unit, int $precision)
    {
        $this->value = $value;
        $this->unit = $unit;
        $this->precision = $precision;
    }
    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }
    /**
     * @return int
     */
    public function getPrecision(): int
    {
        return $this->precision;
    }

}