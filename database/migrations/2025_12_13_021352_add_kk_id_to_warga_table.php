<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->unsignedBigInteger('kk_id')->nullable()->after('warga_id');

            $table->foreign('kk_id')
                ->references('kk_id')
                ->on('keluarga_kk')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropForeign(['kk_id']);
            $table->dropColumn('kk_id');
        });
    }
};
