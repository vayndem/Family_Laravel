<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Password: password
        ]);

        $this->call([
            KenanganKeluargaSeeder::class,
            AnggotaKeluargaSeeder::class,
        ]);
    }
}
