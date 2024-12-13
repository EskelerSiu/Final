<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('productos')->get();
        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $ventas
        ]);
    }

    public function show($venta_id)
    {
        $venta = Venta::with('productos')->find($venta_id);
        if (!$venta) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Venta no encontrada'
            ], 404);
        }

        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $venta
        ]);
    }

    public function store(Request $request)
{
    \Log::info('Request data:', $request->all()); // Log the request data

    $request->validate([
        'descripcion' => 'nullable|string',
        'productos' => 'required|array',
        'productos.*.producto_id' => 'required|integer|exists:productos,producto_id',
        'productos.*.cantidad' => 'required|integer|min:1',
    ]);

    DB::beginTransaction();

    try {
        $total = 0;
        foreach ($request->productos as $producto) {
            $product = Product::find($producto['producto_id']);
            if ($product->stock < $producto['cantidad']) {
                return response()->json([
                    'ok' => false,
                    'status' => 400,
                    'message' => "El producto '{$product->nombre}' no tiene suficiente stock. Disponible: {$product->stock}."
                ], 400);
            }
            $total += $producto['cantidad'] * $product->precio;
        }

        $venta = Venta::create([
            'descripcion' => $request->descripcion ?? '',
            'total' => $total,
        ]);

        foreach ($request->productos as $producto) {
            $venta->productos()->attach($producto['producto_id'], ['cantidad' => $producto['cantidad']]);

            $product = Product::find($producto['producto_id']);
            $product->decrement('stock', $producto['cantidad']);
        }

        DB::commit();

        return response()->json([
            'ok' => true,
            'status' => 201,
            'message' => 'Venta creada exitosamente',
            'body' => $venta->load('productos')
        ], 201);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'ok' => false,
            'status' => 500,
            'message' => 'Error al guardar la venta',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function update(Request $request, $venta_id)
{
    $venta = Venta::find($venta_id);
    if (!$venta) {
        return response()->json([
            'ok' => false,
            'status' => 404,
            'message' => 'Venta no encontrada'
        ], 404);
    }

    $request->validate([
        'descripcion' => 'nullable|string',
        'productos' => 'nullable|array', // Allow updating products
        'productos.*.producto_id' => 'required|integer|exists:productos,producto_id',
        'productos.*.cantidad' => 'required|integer|min:1',
    ]);

    $venta->update([
        'descripcion' => $request->descripcion ?? $venta->descripcion,
    ]);

    if ($request->has('productos')) {
        // Handle product updates (similar to store logic)
        foreach ($request->productos as $producto) {
            // Update or add products
            $product = Product::find($producto['producto_id']);
            if ($product->stock < $producto['cantidad']) {
                return response()->json([
                    'ok' => false,
                    'status' => 400,
                    'message' => "El producto '{$product->nombre}' no tiene suficiente stock. Disponible: {$product->stock}."
                ], 400);
            }

            // Attach or update the products related to this sale
            $venta->productos()->updateExistingPivot($producto['producto_id'], ['cantidad' => $producto['cantidad']]);

            // Optionally, you can decrement the stock here if you're updating the products.
            $product->decrement('stock', $producto['cantidad']);
        }
    }

    return response()->json([
        'ok' => true,
        'status' => 200,
        'message' => 'Venta actualizada',
        'body' => $venta->load('productos')
    ]);
}

    public function destroy($venta_id)
    {
        $venta = Venta::find($venta_id);
        if (!$venta) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Venta no encontrada'
            ], 404);
        }

        // Restaurar stock de los productos asociados a la venta
        foreach ($venta->productos as $producto) {
            $producto->increment('stock', $producto->pivot->cantidad);
        }

        $venta->delete();

        return response()->json([
            'ok' => true,
            'status' => 200,
            'message' => 'Venta eliminada correctamente'
        ]);
    }
}