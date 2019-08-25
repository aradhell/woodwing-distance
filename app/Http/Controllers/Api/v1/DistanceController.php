<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Controller;
use App\Models\Unit\UnitTypes;
use App\Services\Distance\DistanceService;
use App\Services\Distance\GetDistanceInput;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Class DistanceController
 * @package App\Http\Controllers\Api\v1
 */
class DistanceController extends Controller
{


    /**
     * @var DistanceService
     */
    private $distanceService;

    /**
     * Create a new controller instance.
     *
     * @param DistanceService $distanceService
     */
    public function __construct(DistanceService $distanceService)
    {
        $this->distanceService = $distanceService;
    }

    /**
     * Calculate distance
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \App\Exceptions\InvalidUnitException
     */
    public function calculate(Request $request): JsonResponse
    {
        $availableUnits = UnitTypes::toString();

        $this->validate($request, [
            'distances' => 'required|array',
            'distances.*.value' => 'required|numeric',
            'distances.*.unit' => "required|string|in:{$availableUnits}",
            'outputUnit' => "required|string|in:{$availableUnits}",
            'precision' => 'int',
            'absolute' => 'boolean',
        ]);

        $this->prepareOptionalParams($request);

        $getDistanceInput = new GetDistanceInput(
            $request['distances'],
            $request['outputUnit'],
            $request['precision'],
            $request['absolute']
        );

        $distance = $this->distanceService->getDistance($getDistanceInput);

        return response()->json([
            'data' => [
                'value' => $distance->getValue(),
                'unit' => $distance->getUnit(),
                'precision' => $distance->getPrecision(),
            ]
        ]);
    }

    private function prepareOptionalParams(Request $request)
    {
        $optionalParams = array(
            'precision' => getenv('DEFAULT_CALCULATION_PRECISION'),
            'absolute' => getenv('DEFAULT_CALCULATION_ABSOLUTE'),
        );
        foreach ($optionalParams as $optionalParam => $value) {
            if(!$request->has($optionalParam)) {
                $request->merge([
                    $optionalParam => $value,
                ]);
            }
        }
    }

}