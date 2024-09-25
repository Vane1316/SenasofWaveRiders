<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
// Se utlizo perplexity  para la Autenticacion de credenciales de usuariO tipo B(User_Admi) 
class AuthService
{
    /**
     * Intenta autenticar al usuario administrador.
     *
     * @param array $credentials
     * @param bool $remember
     * @return bool
     */
    public function attemptAdminLogin(array $credentials, bool $remember = false)
    {
        return Auth::attempt($credentials, $remember);
    }

    /**
     * Verifica si el usuario está habilitado para iniciar sesión.
     *
     * @param string $email
     * @return bool
     */
    public function isUserEnabled($email)
    {
        // Aquí puedes agregar lógica para verificar si el usuario está habilitado.
        // Por ejemplo, podrías comprobar un campo en la base de datos que indique si el usuario está activo.
        return true; // Cambia esto según tu lógica de negocio.
    }
}