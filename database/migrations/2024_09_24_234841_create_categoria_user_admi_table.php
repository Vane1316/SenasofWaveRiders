<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categoria_user_admi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_admi_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            // Definir las relaciones
            $table->foreign('user_admi_id')->references('id')->on('user_admi')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            // Asegurar que la combinación de user_admi_id y categoria_id sea única
            $table->unique(['user_admi_id', 'categoria_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categoria_user_admi');
    }
};
