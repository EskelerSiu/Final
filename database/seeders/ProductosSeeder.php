<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'nombre' => 'Producto A',
                'precio' => 50.00,
                'stock' => 100,
                'url' => 'https://example.com/producto_a.jpg',
            ],
            [
                'nombre' => 'Producto B',
                'precio' => 150.00,
                'stock' => 50,
                'url' => 'https://example.com/producto_b.jpg',
            ],
            [
                'nombre' => 'Producto C',
                'precio' => 75.25,
                'stock' => 200,
                'url' => 'https://example.com/producto_c.jpg',
            ],
        ]);
    }
}