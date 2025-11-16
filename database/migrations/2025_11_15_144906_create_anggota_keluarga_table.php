<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // hanya buat jika belum ada
        if (! Schema::hasTable('anggota_keluarga')) {
            Schema::create('anggota_keluarga', function (Blueprint $table) {
                $table->id('anggota_id');
                $table->unsignedBigInteger('kk_id');
                $table->unsignedBigInteger('warga_id')->nullable();
                $table->string('hubungan')->nullable();
                $table->timestamps();

                // foreign key mengacu ke keluarga_kk(kk_id)
                $table->foreign('kk_id')
                      ->references('kk_id')->on('keluarga_kk')
                      ->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_keluarga');
    }
};
