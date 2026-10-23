<?php

namespace App\Http\Controllers;

use App\Services\PublicMapMarkers;
use Illuminate\View\View;

class MapController extends Controller
{
    public function __invoke(): View
    {
        return view('map.index', [
            'markers' => PublicMapMarkers::reports(),
            'trails' => PublicMapMarkers::trails(),
        ]);
    }
}