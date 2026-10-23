<?php

namespace App\Http\Controllers;

use App\Services\PublicMapMarkers;
use Illuminate\Http\JsonResponse;

class ApiMapController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'markers' => PublicMapMarkers::reports(),
            'trails' => PublicMapMarkers::trails(),
        ]);
    }
}