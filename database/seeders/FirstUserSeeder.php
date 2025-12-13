<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;
use App\Models\User;

class FirstUserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = FakerFactory::create('id_ID');

        // ===================================
        // 1. Admin Utama (Tetap 1)
        // ===================================
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin Utama',
                'password' => Hash::make('password123'),
                'role'     => 'admin',
            ]
        );

        // ===================================
        // 2. Generate User Random (admin / guest)
        // ===================================
        $roles = ['admin', 'guest'];

        for ($i = 1; $i <= 300; $i++) {
            $nama = $faker->firstName() . ' ' . $faker->lastName();

            User::create([
                'name'     => $nama,
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'role'     => $faker->randomElement($roles),
            ]);
        }
    }
}
