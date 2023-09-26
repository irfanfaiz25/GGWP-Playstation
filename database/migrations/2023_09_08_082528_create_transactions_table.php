<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('tarif');
            $table->string('user')->nullable();
            $table->string('jam_mulai')->nullable()->default('00:00');
            $table->string('jam_selesai')->nullable()->default('00:00');
            $table->string('lama_main')->nullable();
            $table->integer('total_harga')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};