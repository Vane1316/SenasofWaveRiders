<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
// Se utlizo perplexity  para mejorar el controlador y utilizar las validaciones para autenticación de administrador.
class Admi_Controller extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Maneja el inicio de sesión del usuario administrador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Admi(Request $request)
    {
    
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($this->authService->isUserEnabled($credentials['email'])) {
            $remember = $request->has('remember');

            // Intentar autenticar al usuario utilizando el servicio
            if ($this->authService->attemptAdminLogin($credentials, $remember)) {
                $request->session()->regenerate();
                
              
                return response()->json([
                    'message' => 'Inicio de sesión exitoso',
                    'user' => Auth::user(), 
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Las credenciales proporcionadas no son correctas.',
                ], 401);
            }
        } else {
            return response()->json([
                'error' => 'El usuario no está habilitado para iniciar sesión.',
            ], 403);
        }
    }

    /**
     * Maneja el cierre de sesión del usuario administrador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Cierre de sesión exitoso.'], 200);
    }
}