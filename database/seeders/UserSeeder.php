<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@email.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'), 
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@email.com'],
            [
                'name' => 'User',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}
