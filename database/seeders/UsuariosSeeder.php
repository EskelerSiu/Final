<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        
        Usuario::create([
                'nombre' => 'Admin',
                'correo' => 'admin@example.com',
                'password' => 'admin123', // Se encriptará automáticamente
                'rol' => 'admin',
            ]);
            Usuario::create([
                'nombre' => 'Usuario 1',
                'correo' => 'usuario1@example.com',
                'password' => 'user1234', // Se encriptará automáticamente
                'rol' => 'user',
            ]);
                Usuario::create([
                'nombre' => 'Usuario 2',
                'correo' => 'usuario2@example.com',
                'password' => 'user5678', // Se encriptará automáticamente
                'rol' => 'user',
            ]);
        
    }
}