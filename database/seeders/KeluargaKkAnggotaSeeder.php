<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KeluargaKk;
use App\Models\AnggotaKeluarga;
use App\Models\Warga;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KeluargaKkAnggotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AnggotaKeluarga::truncate();
        KeluargaKk::truncate();
        Warga::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create('id_ID');  // → Nama Indonesia

        for ($i = 1; $i <= 100; $i++) {

            // 🧍‍♂ Buat nama kepala keluarga (laki-laki)
            $namaKepala = $faker->name('male');

            $kkNomor = '327601'.rand(1000000000, 9999999999);

            // 🧍‍♂ SIMPAN WARGA KEPALA KELUARGA
            $kepala = Warga::create([
                'no_ktp'        => $kkNomor,
                'nama'          => $namaKepala,
                'jenis_kelamin' => 'Laki-laki',
                'agama'         => 'Islam',
                'pekerjaan'     => $faker->jobTitle(),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
            ]);

            // 🏠 SIMPAN DATA KK
            $keluarga = KeluargaKk::create([
                'kk_nomor'                 => $kkNomor,
                'kepala_keluarga_warga_id' => $kepala->warga_id,
                'alamat'                   => $faker->streetAddress(),
                'rt'                       => rand(1, 20),
                'rw'                       => rand(1, 10),
            ]);

            // 👨‍👩‍👧‍👦 ANGGOTA = Kepala + Istri + Anak
            AnggotaKeluarga::create([
                'kk_id'    => $keluarga->kk_id,
                'warga_id' => $kepala->warga_id,
                'hubungan' => 'Kepala Keluarga'
            ]);

            // 🧍‍♀ ISTRI
            $istri = Warga::create([
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->name('female'),
                'jenis_kelamin' => 'Perempuan',
                'agama'         => 'Islam',
                'pekerjaan'     => $faker->jobTitle(),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
            ]);

            AnggotaKeluarga::create([
                'kk_id'    => $keluarga->kk_id,
                'warga_id' => $istri->warga_id,
                'hubungan' => 'Istri'
            ]);

            // 🧍‍♂ ANAK
            $anak = Warga::create([
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->firstName(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki','Perempuan']),
                'agama'         => 'Islam',
                'pekerjaan'     => 'Pelajar',
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
            ]);

            AnggotaKeluarga::create([
                'kk_id'    => $keluarga->kk_id,
                'warga_id' => $anak->warga_id,
                'hubungan' => 'Anak'
            ]);
        }
    }
}
