<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('name_categoria')->unique(); 
            $table->integer('puntos'); 
            $table->timestamps();
        });

        
        DB::table('categorias')->insert([
            ['name_categoria' => 'Carnes', 'puntos' => 10],
            ['name_categoria' => 'Granos', 'puntos' => 5],
            ['name_categoria' => 'Lácteos', 'puntos' => 3],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
