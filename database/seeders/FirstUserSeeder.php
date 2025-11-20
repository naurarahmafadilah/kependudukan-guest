<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;

class FirstUserSeeder extends Seeder
{
    public function run(): void
    {
        // PAKSA faker pakai Indonesia
        $faker = FakerFactory::create('id_ID');

        // Admin tetap
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin Utama',
                'password' => Hash::make('password123'),
            ]
        );

        // Tambah 100 user dengan nama Indonesia
        for ($i = 1; $i <= 100; $i++) {
            $nama = $faker->firstName() . ' ' . $faker->lastName(); // lebih stabil Indonesia

            User::create([
                'name'     => $nama,
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
