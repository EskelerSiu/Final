<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $pedidos
        ]);
    }

    public function show($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);
        if (!$pedido) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Pedido not found'
            ], 404);
        }
        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $pedido
        ]);
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create($request->all());
        return response()->json([
            'ok' => true,
            'status' => 201,
            'message' => 'Created Pedido',
            'body' => $pedido
        ], 201);
    }

    public function update(Request $request, $pedido_id)
    {
        $pedido = Pedido::find($pedido_id);
        if (!$pedido) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Pedido not found'
            ], 404);
        }

        $pedido->update($request->all());
        return response()->json([
            'ok' => true,
            'status' => 200,
            'message' => 'Updated Pedido',
            'body' => $pedido
        ]);
    }

    public function destroy($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);
        if (!$pedido) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Pedido not found'
            ], 404);
        }

        $pedido->delete();
        return response()->json([
            'ok' => true,
            'status' => 200,
            'message' => 'Deleted Pedido'
        ]);
    }
}
