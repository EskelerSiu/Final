<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MateriaPrima;
use Illuminate\Support\Facades\DB;

class MateriasPrimasSeeder extends Seeder
{
    public function run()
    {
        DB::table('materia_primas')->insert([
            [
                'nombre' => 'Harina',
                'descripcion' => 'Harina de trigo refinada de alta calidad.',
                'proveedor' => 'Proveedor A',
                'cantidad' => 500,
                'unidad' => 'kg',
                'precio' => 20.50,
                'url' => 'https://example.com/harina',
            ],
            [
                'nombre' => 'Azúcar',
                'descripcion' => 'Azúcar refinada para uso alimenticio.',
                'proveedor' => 'Proveedor B',
                'cantidad' => 300,
                'unidad' => 'kg',
                'precio' => 15.75,
                'url' => 'https://example.com/azucar',
            ],
            [
                'nombre' => 'Leche',
                'descripcion' => 'Leche entera líquida pasteurizada.',
                'proveedor' => 'Proveedor C',
                'cantidad' => 200,
                'unidad' => 'L',
                'precio' => 12.00,
                'url' => 'https://example.com/leche',
            ],
            [
                'nombre' => 'Huevos',
                'descripcion' => 'Huevos frescos orgánicos de granja.',
                'proveedor' => 'Proveedor D',
                'cantidad' => 100,
                'unidad' => 'doz',
                'precio' => 30.00,
                'url' => 'https://example.com/huevos',
            ],
            [
                'nombre' => 'Aceite vegetal',
                'descripcion' => 'Aceite vegetal comestible, ideal para cocinar.',
                'proveedor' => 'Proveedor E',
                'cantidad' => 50,
                'unidad' => 'L',
                'precio' => 18.90,
                'url' => 'https://example.com/aceite',
            ],
        ]);
    }
}
