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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('Transaksi_ID')->unique();
            $table->string('Nama_User');
            $table->string('Email');
            $table->string('Nama_Instruktur')->nullable();
            $table->string('Nama_Kelas')->nullable();
            $table->string('Total_Biaya');
            $table->string('Metode_Pembayaran');
            $table->string('Status')->default('pending');
            $table->string('Snap_Token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
