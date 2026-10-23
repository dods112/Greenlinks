<?php

namespace Database\Seeders;

use App\Models\MapTrail;
use Illuminate\Database\Seeder;

class MapTrailSeeder extends Seeder
{
    public function run(): void
    {
        if (! app()->environment('local')) {
            return;
        }

        MapTrail::updateOrCreate(
            ['name' => 'EXAMPLE: Inland trail'],
            [
                'description' => 'Illustrative trail only. Not a surveyed route.',
                'coordinates' => [
                    [9.0660, 126.1880],
                    [9.0690, 126.1900],
                    [9.0720, 126.1915],
                    [9.0745, 126.1935],
                ],
                'status' => 'published',
                'is_example' => true,
            ]
        );
    }
}