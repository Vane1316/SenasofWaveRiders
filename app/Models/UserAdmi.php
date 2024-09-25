<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdmi extends Model
{
    use HasFactory;

    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }
}
