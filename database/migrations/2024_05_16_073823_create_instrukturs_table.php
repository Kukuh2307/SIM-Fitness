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
        Schema::create('instrukturs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_Kelas');
            $table->string('Nama')->unique();
            $table->string('Email');
            $table->string('Foto');
            $table->string('Deskripsi');
            $table->string('Spesialis');
            $table->string('Biaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrukturs');
    }
};
