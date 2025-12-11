<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            FirstUserSeeder::class,
            KeluargaKkAnggotaSeeder::class,
            PeristiwaKelahiranSeeder::class,
            PeristiwaKematianSeeder::class,
            PeristiwaPindahSeeder::class,
        ]);
    }
}
