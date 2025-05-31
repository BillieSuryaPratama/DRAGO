<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjadwalan', function (Blueprint $table) {
            $table->bigIncrements('ID_Penjadwalan');
            $table->foreignId('ID_Akun')
                ->references('ID_Akun')
                ->on('akun')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dateTime('JamMulai');
            $table->dateTime('JamBerakhir');
            $table->string('Kegiatan', 255);
            $table->enum('Status', ['Belum Dikerjakan', 'Sudah Dikerjakan', 'Terlambat']);
            $table->string('Tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjadwalan');
    }
};
