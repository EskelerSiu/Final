<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos'; // Nombre de la tabla
    protected $primaryKey = 'pedido_id'; // Clave primaria
    public $timestamps = false; // No timestamps automáticos

    protected $fillable = [
        'pedido',
        'fecha',
        'total',
    ];
}
