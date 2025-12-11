<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\PeristiwaPindah;
use App\Models\Warga;
use Faker\Factory as Faker;

class PeristiwaPindahSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Ambil semua warga
        $wargaList = Warga::pluck('warga_id')->toArray();

        if (count($wargaList) < 1) {
            $this->command->warn("⚠ Data warga belum ada.");
            return;
        }

        // Pastikan folder upload tersedia
        Storage::disk('public')->makeDirectory('uploads/pindah');

        $alasanList = [
            'Pekerjaan',
            'Pendidikan',
            'Menikah',
            'Mengikuti orang tua',
            'Lingkungan baru',
            'Tempat kerja baru'
        ];

        $alamatTujuanList = [
            'Jakarta Selatan',
            'Bandung Kota',
            'Surabaya Timur',
            'Bekasi Utara',
            'Depok Margonda',
            'Tangerang Karawaci',
            'Yogyakarta Kota'
        ];

        for ($i = 0; $i < 100; $i++) {

            // 1. Insert Peristiwa Pindah
            $pindah = PeristiwaPindah::create([
                'warga_id'       => $faker->randomElement($wargaList),
                'tgl_pindah'     => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'alamat_tujuan'  => $faker->randomElement($alamatTujuanList),
                'alasan'         => $faker->randomElement($alasanList),
                'no_surat'       => "SPD-" . strtoupper($faker->unique()->bothify('??###')),
            ]);

            // 2. Tambahkan 1–3 file dummy ke media
            $jumlahFile = rand(1, 3);

            for ($j = 1; $j <= $jumlahFile; $j++) {

                // Buat nama file dummy
                $fileName = 'dummy_' . $pindah->pindah_id . '_' . $j . '.txt';

                // Buat isi file dummy
                Storage::disk('public')->put(
                    'uploads/pindah/' . $fileName,
                    "Ini adalah file dummy untuk pindah ID: " . $pindah->pindah_id
                );

                // Masukkan ke tabel media
                DB::table('media')->insert([
                    'ref_table' => 'peristiwa_pindah',
                    'ref_id'    => $pindah->pindah_id,
                    'file_name' => $fileName,
                    'mime_type' => 'text/plain',
                    'caption'   => 'File dummy auto',
                    'sort_order'=> $j,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);
            }
        }
    }
}
