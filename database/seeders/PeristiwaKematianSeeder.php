<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\PeristiwaKematian;
use App\Models\Warga;
use Faker\Factory as Faker;

class PeristiwaKematianSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Ambil warga_id dari tabel warga
        $wargaIDs = Warga::pluck('warga_id')->toArray();

        if (empty($wargaIDs)) {
            $this->command->warn("⚠ Tidak ada data warga. Seeder kematian dilewati.");
            return;
        }

        // Pastikan folder upload ada
        Storage::disk('public')->makeDirectory('uploads/kematian');

        $lokasi_kematian = [
            'Rumah Sakit Umum Daerah',
            'RS Bhayangkara',
            'Puskesmas Induk',
            'Klinik Sehat',
            'Rumah Pribadi',
        ];

        $sebab_kematian = [
            'Sakit tua',
            'Serangan jantung',
            'Kecelakaan',
            'Stroke',
            'Komplikasi penyakit',
            'Infeksi paru',
        ];

        for ($i = 0; $i < 100; $i++) {

            // 1. Simpan data kematian
            $kematian = PeristiwaKematian::create([
                'warga_id'      => $faker->randomElement($wargaIDs),
                'tgl_meninggal' => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'sebab'         => $faker->randomElement($sebab_kematian),
                'lokasi'        => $faker->randomElement($lokasi_kematian),
                'no_surat'      => 'SKM-' . sprintf("%06d", $faker->unique()->numberBetween(100000, 999999)),
            ]);

            // 2. Tambahkan 1–3 file dummy otomatis
            $jumlahFile = rand(1, 3);

            for ($j = 1; $j <= $jumlahFile; $j++) {

                // Nama file dummy
                $fileName = 'kematian_' . $kematian->kematian_id . '_' . $j . '.txt';

                // Isi file dummy
                Storage::disk('public')->put(
                    'uploads/kematian/' . $fileName,
                    "Dummy file kematian untuk ID: " . $kematian->kematian_id
                );

                // Insert ke tabel media
                DB::table('media')->insert([
                    'ref_table' => 'peristiwa_kematian',
                    'ref_id'    => $kematian->kematian_id,
                    'file_name' => $fileName,
                    'mime_type' => 'text/plain',
                    'caption'   => 'File dummy kematian',
                    'sort_order'=> $j,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);
            }
        }
    }
}
