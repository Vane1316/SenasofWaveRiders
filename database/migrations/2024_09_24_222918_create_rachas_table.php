<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rachas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio')->default(Carbon::now()->format('Y-m-d'));
            $table->date('fecha_fin')->default(Carbon::now()->addDays(15)->format('Y-m-d'));
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rachas');
    }
};
