<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas'; // Nombre de la tabla
    protected $primaryKey = 'venta_id'; // Clave primaria personalizada
    public $timestamps = false; // No timestamps automáticos

    protected $fillable = [
        'descripcion',
        'total',
    ];

    public function productos()
    {
        return $this->belongsToMany(Product::class, 'venta_prod', 'venta_id', 'producto_id')
            ->withPivot('cantidad'); // Incluimos la cantidad vendida
    }
}

