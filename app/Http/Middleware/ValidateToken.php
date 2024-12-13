<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ValidateToken
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['message' => 'Access denied'], 403);
        }

        try {
            // Decodificar el token correctamente con la clave secreta y el algoritmo
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
            $request->user = $decoded; // Agregar los datos del usuario al request
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid token', 'error' => $e->getMessage()], 403);
        }

        return $next($request);
    }
}