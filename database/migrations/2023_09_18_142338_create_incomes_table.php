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
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tv_id')->nullable();
            $table->string('user')->nullable();
            $table->string('jam_mulai')->nullable();
            $table->string('jam_selesai')->nullable();
            $table->string('lama_main')->nullable();
            $table->integer('total_rent')->nullable();
            $table->integer('total_tambahan')->nullable();
            $table->string('ket');
            $table->string('nama_menu')->nullable();
            $table->integer('harga_menu')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};