<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use App\Models\Warga;
use App\Models\KeluargaKk;
use App\Models\AnggotaKeluarga;
use App\Models\PeristiwaKelahiran;
use App\Models\PeristiwaKematian;
use App\Models\PeristiwaPindah;

class KeluargaKkAnggotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PeristiwaKelahiran::truncate();
        PeristiwaKematian::truncate();
        PeristiwaPindah::truncate();
        AnggotaKeluarga::truncate();
        KeluargaKk::truncate();
        Warga::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 300; $i++) {

            // ======================
            // KEPALA KELUARGA
            // ======================
            $kepala = Warga::create([
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->name('male'),
                'jenis_kelamin' => 'Laki-laki',
                'agama'         => 'Islam',
                'pekerjaan'     => $faker->jobTitle(),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
            ]);

            // ======================
            // KELUARGA (KK)
            // ======================
            $kk = KeluargaKk::create([
                'kk_nomor'                 => $faker->unique()->numerify('################'),
                'kepala_keluarga_warga_id' => $kepala->warga_id,
                'alamat'                   => $faker->streetAddress(),
                'rt'                       => rand(1, 10),
                'rw'                       => rand(1, 5),
            ]);

            $kepala->update(['kk_id' => $kk->kk_id]);

            AnggotaKeluarga::create([
                'kk_id'    => $kk->kk_id,
                'warga_id' => $kepala->warga_id,
                'hubungan' => 'Kepala Keluarga'
            ]);

            // ======================
            // ISTRI
            // ======================
            $istri = Warga::create([
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->name('female'),
                'jenis_kelamin' => 'Perempuan',
                'agama'         => 'Islam',
                'pekerjaan'     => 'Ibu Rumah Tangga',
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
                'kk_id'         => $kk->kk_id,
            ]);

            AnggotaKeluarga::create([
                'kk_id'    => $kk->kk_id,
                'warga_id' => $istri->warga_id,
                'hubungan' => 'Istri'
            ]);

            // ======================
            // ANAK
            // ======================
            $anak = Warga::create([
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->firstName(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => 'Islam',
                'pekerjaan'     => 'Pelajar',
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
                'kk_id'         => $kk->kk_id,
            ]);

            AnggotaKeluarga::create([
                'kk_id'    => $kk->kk_id,
                'warga_id' => $anak->warga_id,
                'hubungan' => 'Anak'
            ]);

            // ======================
            // PERISTIWA KELAHIRAN (ANAK)
            // ======================
            PeristiwaKelahiran::create([
                'warga_id'     => $anak->warga_id,
                'tgl_lahir'    => $faker->date(),
                'tempat_lahir' => $faker->city(),
                'no_surat'     => 'SKL-' . rand(1000,9999),
                'no_akta'      => 'AKTA-' . rand(100000,999999),
            ]);

            // ======================
            // PERISTIWA PINDAH (RANDOM)
            // ======================
            if (rand(1, 4) == 1) {
                PeristiwaPindah::create([
                    'warga_id' => $kepala->warga_id,
                    'tgl_pindah' => $faker->date(),
                    'alamat_tujuan' => $faker->address(),
                    'alasan' => 'Pekerjaan',
                    'no_surat' => 'SKP-' . rand(1000,9999),
                ]);
            }

            // ======================
            // PERISTIWA KEMATIAN (RANDOM)
            // ======================
            if (rand(1, 8) == 1) {
                PeristiwaKematian::create([
                    'warga_id'     => $kepala->warga_id,
                    'tgl_meninggal'=> $faker->date(),
                    'sebab'        => 'Sakit',
                    'lokasi'       => $faker->city(),
                    'no_surat'     => 'SKM-' . rand(1000,9999),
                ]);
            }
        }
    }
}
