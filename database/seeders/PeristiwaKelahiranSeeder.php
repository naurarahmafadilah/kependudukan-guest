<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\PeristiwaKelahiran;
use App\Models\Warga;
use Faker\Factory as Faker;

class PeristiwaKelahiranSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Ambil semua warga
        $wargaList = Warga::pluck('warga_id')->toArray();

        if (count($wargaList) < 3) {
            $this->command->warn("⚠ Minimal butuh 3 data warga untuk membuat seeder kelahiran.");
            return;
        }

        // Pastikan folder upload tersedia
        Storage::disk('public')->makeDirectory('uploads/kelahiran');

        $tempatList = [
            'RSUD Kota',
            'RS Bhayangkara',
            'Klinik Sehat Mandiri',
            'Puskesmas Induk',
            'Rumah Bersalin Siti Maryam',
            'Rumah Pribadi'
        ];

        for ($i = 0; $i < 100; $i++) {

            // Pilih bayi random
            $bayi = $faker->randomElement($wargaList);

            // Pilih ayah & ibu (HARUS berbeda)
            do {
                $ayah = $faker->randomElement($wargaList);
            } while ($ayah == $bayi);

            do {
                $ibu = $faker->randomElement($wargaList);
            } while ($ibu == $bayi || $ibu == $ayah);

            // 1. Insert ke tabel kelahiran
            $kelahiran = PeristiwaKelahiran::create([
                'warga_id'      => $bayi,
                'ayah_warga_id' => $ayah,
                'ibu_warga_id'  => $ibu,
                'tgl_lahir'     => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'tempat_lahir'  => $faker->randomElement($tempatList),
                'no_akta'       => 'AKTA-' . sprintf("%06d", $faker->unique()->numberBetween(100000, 999999)),
            ]);

            // 2. Tambah multiple dummy file
            $jumlahFile = rand(1, 3); // 1–3 file per kelahiran

            for ($j = 1; $j <= $jumlahFile; $j++) {

                // Buat nama file dummy
                $fileName = 'kelahiran_' . $kelahiran->kelahiran_id . '_' . $j . '.txt';

                // Buat isi file dummy
                Storage::disk('public')->put(
                    'uploads/kelahiran/' . $fileName,
                    "Dummy file kelahiran untuk ID: " . $kelahiran->kelahiran_id
                );

                // Masukkan ke tabel media
                DB::table('media')->insert([
                    'ref_table' => 'peristiwa_kelahiran',
                    'ref_id'    => $kelahiran->kelahiran_id,
                    'file_name' => $fileName,
                    'mime_type' => 'text/plain',
                    'caption'   => 'Dummy file auto',
                    'sort_order'=> $j,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);
            }
        }
    }
}
