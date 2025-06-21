<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Pending',
            'In Progress',
            'Completed',
        ];

        foreach ($statuses as $status) {
            Status::firstOrCreate(['name' => $status]);
        }
    }
}
