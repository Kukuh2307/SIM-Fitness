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
        Schema::create('listing_alats', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Alat');
            $table->string('Jumlah');
            $table->string('Kondisi_Alat');
            $table->string('Foto');
            $table->string('Merk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_alats');
    }
};
