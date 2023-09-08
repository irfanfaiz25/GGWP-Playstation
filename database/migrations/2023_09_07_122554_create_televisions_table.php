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
        Schema::create('televisions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('tarif');
            $table->string('kondisi_tv');
            $table->string('kondisi_ps');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('televisions');
    }
};