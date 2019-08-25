<?php

namespace App\Services\Distance;


class GetDistanceInput
{

    private $distances = [];
    private $outputUnit;
    private $precision;
    private $absolute = false;

    public function __construct(array $distances, string $outputUnit, int $precision, bool $absolute)
    {
        $this->distances = $distances;
        $this->outputUnit = $outputUnit;
        $this->precision = $precision;
        $this->absolute = $absolute;
    }

    /**
     * @return array
     */
    public function getDistances(): array
    {
        return $this->distances;
    }

    /**
     * @return string
     */
    public function getOutputUnit(): string
    {
        return $this->outputUnit;
    }

    /**
     * @return int
     */
    public function getPrecision(): int
    {
        return $this->precision;
    }

    /**
     * @return bool
     */
    public function isAbsolute(): bool
    {
        return $this->absolute;
    }

}