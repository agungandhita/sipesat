<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder lain yang mungkin sudah ada
        // $this->call(UserSeeder::class);

        // Panggil seeder baru
        $this->call([
            InformasiSeeder::class,
            KomentarSeeder::class,
            PendudukSeeder::class,
        ]);
    }
}

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
