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
        Schema::create('akun', function (Blueprint $table) {
            $table->bigIncrements('ID_Akun');
            $table->foreignId('ID_Jabatan')
                ->references('ID_Jabatan')
                ->on('jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('Nama', 50);
            $table->string('Alamat', 50);
            $table->string('Nomor_HP', 20);
            $table->string('Username', 20)
                ->unique();
            $table->string('Email', 255);
            $table->string('Sandi', 255);
            $table->boolean('Status_Akun')
                ->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
