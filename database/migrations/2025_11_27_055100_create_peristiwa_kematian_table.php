<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('peristiwa_kematian', function (Blueprint $table) {
            $table->id('kematian_id');
            $table->unsignedBigInteger('warga_id');
            $table->date('tgl_meninggal');
            $table->string('sebab');
            $table->string('lokasi');
            $table->string('no_surat')->unique();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peristiwa_kematian');
    }
};
