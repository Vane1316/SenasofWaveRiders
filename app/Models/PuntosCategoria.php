<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntosCategoria extends Model
{
    use HasFactory;

    // Especifica las columnas que puedes llenar automáticamente
    protected $fillable = ['categoria_id', 'racha_id', 'puntos'];
}
