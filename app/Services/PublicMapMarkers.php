<?php

namespace App\Services;

use App\Models\EnvironmentalReport;
use App\Models\MapTrail;
use App\ReportStatus;
use Illuminate\Support\Collection;

class PublicMapMarkers
{
    /** Verified-or-later reports. Coordinates rounded to ~110 m. No reporter data. */
    public static function reports(): Collection
    {
        return EnvironmentalReport::query()
            ->whereIn('status', [
                ReportStatus::Verified,
                ReportStatus::Assigned,
                ReportStatus::InProgress,
                ReportStatus::Resolved,
            ])
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['id', 'reference_code', 'title', 'category', 'barangay', 'status', 'latitude', 'longitude'])
            ->map(fn (EnvironmentalReport $r) => [
                'reference_code' => $r->reference_code,
                'title' => $r->title,
                'category' => config('greenlink.categories')[$r->category] ?? $r->category,
                'barangay' => $r->barangay,
                'status' => $r->status->label(),
                'lat' => round((float) $r->latitude, 3),
                'lng' => round((float) $r->longitude, 3),
            ])
            ->values();
    }

    /** Published trails. Example trails only appear when GREENLINK_SHOW_EXAMPLES=true. */
    public static function trails(): Collection
    {
        $showExamples = (bool) env('GREENLINK_SHOW_EXAMPLES', true);

        return MapTrail::query()
            ->published()
            ->when(! $showExamples, fn ($q) => $q->where('is_example', false))
            ->get(['id', 'name', 'description', 'coordinates', 'is_example'])
            ->map(fn (MapTrail $t) => [
                'name' => $t->name,
                'description' => $t->description,
                'coordinates' => $t->coordinates,
                'is_example' => $t->is_example,
            ])
            ->values();
    }
}