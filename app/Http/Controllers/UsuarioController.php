<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $usuarios
        ]);
    }

    public function show($usuario_id)
    {
        $usuario = Usuario::find($usuario_id);
        if (!$usuario) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Usuario not found'
            ], 404);
        }
        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $usuario
        ]);
    }

    public function store(Request $request)
    {
        $usuario = Usuario::create($request->all());
        return response()->json([
            'ok' => true,
            'status' => 201,
            'message' => 'Created Usuario',
            'body' => $usuario
        ], 201);
    }

    public function update(Request $request, $usuario_id)
    {
        $usuario = Usuario::find($usuario_id);
        if (!$usuario) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Usuario not found'
            ], 404);
        }

        $usuario->update($request->all());
        return response()->json([
            'ok' => true,
            'status' => 200,
            'message' => 'Updated Usuario',
            'body' => $usuario
        ]);
    }

    public function destroy($usuario_id)
    {
        $usuario = Usuario::find($usuario_id);
        if (!$usuario) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Usuario not found'
            ], 404);
        }

        $usuario->delete();
        return response()->json([
            'ok' => true,
            'status' => 200,
            'message' => 'Deleted Usuario'
        ]);
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('correo', $request->correo)->first();
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json([
                'ok' => false,
                'status' => 401,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $payload = [
            'iss' => "your-app-name",
            'sub' => $usuario->usuario_id,
            'correo' => $usuario->correo,
            'rol' => $usuario->rol,
            'iat' => time(),
            'exp' => time() + 3600
        ];

        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        return response()->json([
            'ok' => true,
            'status' => 200,
            'token' => $token
        ]);
    }
}
