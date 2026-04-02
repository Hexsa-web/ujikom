<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('resep_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'resep_id']); // satu user tidak boleh favorite resep yang sama 2x
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
};