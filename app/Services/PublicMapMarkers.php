<?php

namespace App\Services;

use App\Models\EnvironmentalReport;
use App\ReportStatus;
use Illuminate\Support\Collection;

class PublicMapMarkers
{
    /**
     * Public markers: verified-or-later reports with coordinates.
     * Reporter identity, user_id, and free-text details are never included.
     */
    public static function reports(): Collection
    {
        $publicStatuses = [
            ReportStatus::Verified,
            ReportStatus::Assigned,
            ReportStatus::InProgress,
            ReportStatus::Resolved,
        ];

        return EnvironmentalReport::query()
            ->whereIn('status', $publicStatuses)
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(['id', 'reference_code', 'title', 'category', 'barangay', 'status', 'latitude', 'longitude'])
            ->map(fn (EnvironmentalReport $r) => [
                'reference_code' => $r->reference_code,
                'title' => $r->title,
                'category' => config('greenlink.categories')[$r->category] ?? $r->category,
                'barangay' => $r->barangay,
                'status' => $r->status->label(),
                'lat' => (float) $r->latitude,
                'lng' => (float) $r->longitude,
            ])
            ->values();
    }
}