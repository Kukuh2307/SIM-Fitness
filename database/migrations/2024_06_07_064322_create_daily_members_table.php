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
        Schema::create('daily_members', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('no_transaction');
            $table->string('member_name');
            $table->string('member_email');
            $table->string('item_name')->default('Paket Harian');
            $table->integer('price');
            $table->string('status')->default('Pending');
            $table->string('invoice_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_members');
    }
};
