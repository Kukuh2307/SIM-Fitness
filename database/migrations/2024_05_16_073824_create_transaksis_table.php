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
            $table->increments('id');
            $table->string('Nama_User');
            $table->string('Nama_Instruktur');
            $table->string('Nama_Kelas');
            $table->string('Total_Biaya');
            $table->enum('Metode_Pembayaran', ['BCA', 'OVO', 'DANA', 'GOPAY', 'LINKAJA', 'SHOPEEPAY'])->default('BCA');
            $table->enum('Status', ['pending', 'success', 'failed'])->default('pending');
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
