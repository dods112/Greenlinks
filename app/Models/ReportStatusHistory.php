<?php

namespace App\Models;

use App\ReportStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportStatusHistory extends Model
{
    protected $table = 'report_status_histories';

    protected $fillable = [
        'environmental_report_id',
        'from_status',
        'to_status',
        'changed_by_user_id',
        'reason',
    ];

    protected $casts = [
        'from_status' => ReportStatus::class,
        'to_status' => ReportStatus::class,
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(EnvironmentalReport::class, 'environmental_report_id');
    }

    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by_user_id');
    }
}