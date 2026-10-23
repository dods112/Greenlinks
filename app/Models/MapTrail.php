<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MapTrail extends Model
{
    protected $fillable = ['name', 'description', 'coordinates', 'status', 'is_example'];

    protected $casts = [
        'coordinates' => 'array',
        'is_example' => 'boolean',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }
}