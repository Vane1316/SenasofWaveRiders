<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdmiModel extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'is_enabled', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'is_enabled' => 'boolean',
    ];

    // Método para verificar si el usuario es administrador
    public function isAdmin()
    {
        return $this->is_admin;
    }

    // Método para verificar si el usuario está habilitado
    public function isEnabled()
    {
        return $this->is_enabled;
    }
}