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
        Schema::create('laporan', function (Blueprint $table) {
            $table->bigIncrements('ID_Laporan');
            $table->foreignId('ID_Akun')
                ->nullable()
                ->references('ID_Akun')
                ->on('akun')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->dateTime('Tanggal_Laporan');
            $table->integer('Jumlah_Tumbuhan_Sehat');
            $table->integer('Jumlah_Tumbuhan_Sakit');
            $table->text('Keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
