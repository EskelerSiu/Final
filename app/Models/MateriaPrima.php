<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    use HasFactory;

    protected $table = 'materia_primas'; // Tabla en PostgreSQL
    protected $primaryKey = 'materia_prima_id'; // Clave primaria
    public $timestamps = false; // No usar timestamps automáticamente

    protected $fillable = [
        'nombre',
        'descripcion',
        'proveedor',
        'cantidad',
        'unidad',
        'precio',
        'url',
    ];
}