<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        \App\Models\User::factory()->create([
            'nama' => 'Admin Sipesat',
            'email' => 'admin@sipesat.com',
            'password' => 12345678,
            'role' => 'admin'
        ]);

        // Regular user
        \App\Models\User::factory()->create([
            'nama' => 'User Sipesat',
            'email' => 'user@sipesat.com',
            'password' => 12345678,
            'role' => 'user'
        ]);
    }
}
