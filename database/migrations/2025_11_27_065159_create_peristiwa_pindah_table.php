<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeristiwaPindahTable extends Migration
{
    public function up()
    {
        Schema::create('peristiwa_pindah', function (Blueprint $table) {
            $table->id('pindah_id');
            $table->unsignedBigInteger('warga_id');
            $table->date('tgl_pindah');
            $table->string('alamat_tujuan');
            $table->string('alasan')->nullable();
            $table->string('no_surat')->unique();
            $table->timestamps();

            $table->foreign('warga_id')->references('warga_id')->on('warga');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peristiwa_pindah');
    }
}
