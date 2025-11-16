<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FirstUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],  // kunci unik
            [
                'name'     => 'Admin Utama',
                'password' => Hash::make('password123'),
                // kalau ada kolom role:
                // 'role' => 'admin',
            ]
        );
    }
}
