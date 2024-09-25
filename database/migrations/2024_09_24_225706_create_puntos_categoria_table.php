<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('puntos_categoria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id'); 
            $table->unsignedBigInteger('racha_id'); 
            $table->integer('puntos'); 
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('racha_id')->references('id')->on('rachas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('puntos_categoria');
    }
};
