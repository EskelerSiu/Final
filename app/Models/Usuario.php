<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla
    protected $primaryKey = 'usuario_id'; // Clave primaria personalizada
    public $timestamps = false; // Desactivamos timestamps automáticos

    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'rol',
    ];

    // Mutador para encriptar la contraseña automáticamente
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}