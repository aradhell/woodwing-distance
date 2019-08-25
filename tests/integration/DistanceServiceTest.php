<?php

class DistanceServiceTest extends TestCase
{


    /**
     * @var App\Services\Distance\DistanceService
     */
    public $distanceService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->distanceService = new \App\Services\Distance\DistanceService();
    }

    public function testGetDistance(): void
    {
        $request = array(
            'distances' => array(
                ['value' => 3, 'unit' => 'Meter'],
                ['value' => 2, 'unit' => 'Meter'],
            ),
            'outputUnit' => 'Meter',
            'precision' => 2,
            'absolute' => 1,
        );

        $getDistanceInput = new \App\Services\Distance\GetDistanceInput(
            $request['distances'],
            $request['outputUnit'],
            $request['precision'],
            $request['absolute']
        );

        $distance = $this->distanceService->getDistance($getDistanceInput);

        $this->assertInstanceOf(\App\Services\Distance\GetDistanceOutput::class, $distance);
        $this->assertEquals(5, $distance->getValue());
        $this->assertEquals(\App\Models\Unit\UnitTypes::METER, $distance->getUnit());
        $this->assertEquals(2, $distance->getPrecision());

    }

}