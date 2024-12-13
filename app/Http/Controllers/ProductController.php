<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $products
        ]);
    }

    public function show($producto_id)
    {
        $product = Product::find($producto_id);
        if (!$product) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }
        return response()->json([
            'ok' => true,
            'status' => 200,
            'body' => $product
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json([
            'ok' => true,
            'status' => 201,
            'message' => 'Created Product',
            'body' => $product
        ], 201);
    }

    public function update(Request $request, $producto_id)
    {
        $product = Product::find($producto_id);
        if (!$product) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }

        $product->update($request->all());
        return response()->json([
            'ok' => true,
            'status' => 200,
            'message' => 'Updated Product',
            'body' => $product
        ]);
    }

    public function destroy($producto_id)
    {
        $product = Product::find($producto_id);
        if (!$product) {
            return response()->json([
                'ok' => false,
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();
        return response()->json([
            'ok' => true,
            'status' => 200,
            'message' => 'Deleted Product'
        ]);
    }
}
