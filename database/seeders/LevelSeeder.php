<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'Low',
            'Medium',
            'High',
        ];

        foreach ($levels as $level) {
            Level::firstOrCreate(['name' => $level]);
        }
    }
}
