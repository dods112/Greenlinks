<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnvironmentalReportRequest;
use App\Models\EnvironmentalReport;
use App\ReportStatus;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(Request $request): View
    {
        $reports = EnvironmentalReport::where('user_id', $request->user()->id)
            ->latest()
            ->paginate(10);

        return view('reports.index', compact('reports'));
    }

    public function create(): View
    {
        Gate::authorize('create', EnvironmentalReport::class);

        return view('reports.create', [
            'categories' => config('greenlink.categories'),
            'barangays' => config('greenlink.barangays'),
        ]);
    }

    public function store(StoreEnvironmentalReportRequest $request): RedirectResponse
    {
        $user = $request->user();

        $report = DB::transaction(function () use ($request, $user) {
            $report = EnvironmentalReport::create([
                ...$request->validated(),
                'user_id' => $user->id,
                'reference_code' => EnvironmentalReport::generateReferenceCode(),
                'status' => ReportStatus::Submitted,
            ]);

            $report->statusHistories()->create([
                'from_status' => null,
                'to_status' => ReportStatus::Submitted,
                'changed_by_user_id' => $user->id,
                'reason' => 'Report submitted by resident.',
            ]);

            return $report;
        });

        return redirect()
            ->route('reports.show', $report)
            ->with('status', 'Report submitted. Your reference code is '.$report->reference_code.'.');
    }

    public function show(EnvironmentalReport $report): View
    {
        Gate::authorize('view', $report);

        $report->load('statusHistories.changedBy');

        return view('reports.show', compact('report'));
    }
}