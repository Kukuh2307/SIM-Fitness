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
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_Instruktur');
            $table->string('Nama_Kelas')->unique();
            $table->string('Deskripsi');
            $table->string('Biaya');
            $table->time('Waktu_Mulai');
            $table->time('Waktu_Selesai');
            $table->string('Hari');
            $table->string('Kuota');
            $table->string('Foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
