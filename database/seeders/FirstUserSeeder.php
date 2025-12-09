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

        User::truncate();
        $faker = FakerFactory::create('id_ID');

        // ===================================
        // 1. Admin Utama (Role: admin)
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
        // 2. Generate 100 User Random
        // ===================================
        $roles = ['operator', 'rt']; // role selain admin

        for ($i = 1; $i <= 300; $i++) {
            $nama = $faker->firstName() . ' ' . $faker->lastName();

            User::create([
                'name'     => $nama,
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
                'role'     => $faker->randomElement($roles), // role acak
            ]);
        }
    }
}
