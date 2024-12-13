<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venta;

class VentasSeeder extends Seeder
{
    public function run()
    {
        Venta::insert([
            [
                'descripcion' => 'Venta de productos electrónicos',
                'total' => 1250.50,
            ],
            [
                'descripcion' => 'Venta de ropa',
                'total' => 750.00,
            ],
            [
                'descripcion' => 'Venta de accesorios para hogar',
                'total' => 450.75,
            ],
        ]);
    }
}
