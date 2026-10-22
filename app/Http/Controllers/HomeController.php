<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentalReport;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'totalReports' => EnvironmentalReport::count(),
            'openReports' => EnvironmentalReport::whereIn('status', ['submitted', 'under_review'])->count(),
            'resolvedReports' => EnvironmentalReport::where('status', 'resolved')->count(),
        ]);
    }
}