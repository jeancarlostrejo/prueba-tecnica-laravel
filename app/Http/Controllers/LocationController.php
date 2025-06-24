<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function states(Request $request, Country $country): JsonResponse
    {
        $states = State::where('country_id', $country->id)->get();

        return response()->json($states);
    }

    public function cities(Request $request, State $state): JsonResponse
    {
        $cities = City::where('state_id', $state->id)->get();

        return response()->json($cities);
    }
}
