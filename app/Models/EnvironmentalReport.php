<?php

namespace App\Models;

use App\ReportStatus;
use App\Policies\ReportPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[UsePolicy(ReportPolicy::class)]
class EnvironmentalReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reference_code',
        'title',
        'category',
        'short_description',
        'detailed_description',
        'location_text',
        'barangay',
        'latitude',
        'longitude',
        'date_observed',
        'status',
    ];

    protected $casts = [
        'date_observed' => 'date',
        'status' => ReportStatus::class,
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusHistories(): HasMany
    {
        return $this->hasMany(ReportStatusHistory::class)->oldest();
    }

    public static function generateReferenceCode(): string
    {
        do {
            $code = 'GL-'.strtoupper(Str::random(4)).'-'.strtoupper(Str::random(4));
        } while (static::where('reference_code', $code)->exists());

        return $code;
    }
}