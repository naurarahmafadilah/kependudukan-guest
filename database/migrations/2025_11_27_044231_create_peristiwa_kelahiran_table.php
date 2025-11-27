<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('peristiwa_kelahiran', function (Blueprint $table) {
            $table->id('kelahiran_id');
            $table->unsignedBigInteger('warga_id');
            $table->unsignedBigInteger('ayah_warga_id')->nullable();
            $table->unsignedBigInteger('ibu_warga_id')->nullable();
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('no_akta')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peristiwa_kelahiran');
    }
};
