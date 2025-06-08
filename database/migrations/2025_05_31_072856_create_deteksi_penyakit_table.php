<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deteksi_penyakit', function (Blueprint $table) {
            $table->bigIncrements('ID_Deteksi');
            $table->foreignId('ID_Akun')
                ->references('ID_Akun')
                ->on('akun')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('ID_Penyakit')
                ->references('ID_Penyakit')
                ->on('penyakit')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->binary('Gambar_Deteksi');
            $table->float('Akurasi');
            $table->dateTime('Tanggal_Deteksi');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE deteksi_penyakit MODIFY Gambar_Deteksi LONGBLOB');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deteksi_penyakit');
    }
};
