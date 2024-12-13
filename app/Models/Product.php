<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Nombre de la tabla
    protected $primaryKey = 'producto_id'; // Clave primaria personalizada
    public $timestamps = false; // No timestamps automáticos

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'url',
    ];

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'venta_prod', 'producto_id', 'venta_id')
            ->withPivot('cantidad'); // Incluimos la cantidad vendida
    }
}
