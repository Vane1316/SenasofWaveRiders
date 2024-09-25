<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racha extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_inicio', 'fecha_fin', 'user_id'];

    // Relación con PuntosCategoria
    public function puntosCategorias()
    {
        return $this->hasMany(PuntosCategoria::class);
    }
}
