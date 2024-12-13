<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidosSeeder extends Seeder
{
    public function run()
    {
        Pedido::insert([
            [
                'pedido' => 'Pedido A',
                'fecha' => '2024-12-01',
                'total' => 120.50,
            ],
            [
                'pedido' => 'Pedido B',
                'fecha' => '2024-12-02',
                'total' => 450.00,
            ],
            [
                'pedido' => 'Pedido C',
                'fecha' => '2024-12-03',
                'total' => 230.75,
            ],
        ]);
    }
}
