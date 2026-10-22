<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentalReport;
use App\ReportStatus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $base = EnvironmentalReport::where('user_id', $request->user()->id);

        $total = (clone $base)->count();
        $resolved = (clone $base)->where('status', ReportStatus::Resolved)->count();
        $open = (clone $base)->whereNotIn('status', [ReportStatus::Resolved, ReportStatus::Rejected])->count();
        $recent = (clone $base)->latest()->limit(5)->get();

        return view('dashboard', compact('total', 'open', 'resolved', 'recent'));
    }
}