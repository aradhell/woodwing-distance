<?php

class ApiTest extends TestCase
{

    private $defaultPrecision;

    protected function setUp(): void
    {
        parent::setUp();
        $this->defaultPrecision = (int)getenv("DEFAULT_CALCULATION_PRECISION");
    }

    /**
     * @return void
     */
    public function testMeterMeter(): void
    {
        $request = array(
            'distances' => array(
                ['value' => 3, 'unit' => 'Meter'],
                ['value' => 2, 'unit' => 'Meter'],
            ),
            'outputUnit' => 'Meter'
        );

        $this->post('/api/v1', $request)
            ->seeJsonEquals([
                'data' => ['value' => 5, 'unit' => 'Meter', 'precision' => $this->defaultPrecision],
            ]);
    }

    /**
     * @return void
     */
    public function testYardMeterWithPrecision(): void
    {
        $request = array(
            'distances' => array(
                ['value' => 3, 'unit' => 'Yard'],
                ['value' => 5, 'unit' => 'Meter'],
            ),
            'outputUnit' => 'Meter',
            'precision' => 3
        );

        $this->post('/api/v1', $request)
            ->seeJsonEquals([
                'data' => ['value' => 7.743, 'unit' => 'Meter', 'precision' => 3],
            ]);
    }

    /**
     * @return void
     */
    public function testYardMeterWithoutPrecision(): void
    {
        $request = array(
            'distances' => array(
                ['value' => 3, 'unit' => 'Yard'],
                ['value' => 5, 'unit' => 'Meter'],
            ),
            'outputUnit' => 'Meter'
        );

        $this->post('/api/v1', $request)
            ->seeJsonEquals([
                'data' => ['value' => 7.74, 'unit' => 'Meter', 'precision' => $this->defaultPrecision],
            ]);
    }

    /**
     * @return void
     */
    public function testWithUndefinedUnit(): void
    {
        $request = array(
            'distances' => array(
                ['value' => 3, 'unit' => 'undefined_unit'],
            ),
            'outputUnit' => 'Meter'
        );

        $this->post('/api/v1', $request)
            ->seeStatusCode(400);
    }

    /**
     * @return void
     */
    public function testToUndefinedUnit(): void
    {
        $request = array(
            'distances' => array(
                ['value' => 3, 'unit' => 'Meter'],
            ),
            'outputUnit' => 'undefined_unit'
        );

        $this->post('/api/v1', $request)
            ->seeStatusCode(400);
    }

}