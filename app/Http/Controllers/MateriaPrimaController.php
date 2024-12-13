<?php

namespace App\Http\Controllers;

use App\Models\MateriaPrima;
use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
    public function index()
    {
        $materiasPrimas = MateriaPrima::all();
        return response()->json(['ok' => true, 'status' => 200, 'body' => $materiasPrimas]);
    }

    public function show($materia_prima_id)
    {
        $materiaPrima = MateriaPrima::find($materia_prima_id);
        return response()->json(['ok' => true, 'status' => 200, 'body' => $materiaPrima]);
    }

    public function store(Request $request)
    {
        $materiaPrima = MateriaPrima::create($request->all());
        return response()->json([
            'ok' => true,
            'status' => 201,
            'message' => 'Created MateriaPrima',
            'body' => $materiaPrima
        ], 201);
    }

    public function update(Request $request, $materia_prima_id)
    {
        $materiaPrima = MateriaPrima::find($materia_prima_id);
        if (!$materiaPrima) {
        return response()->json([
            'ok' => false,
            'status' => 404,
            'message' => 'Materia Prima not found'
        ], 404);
    }

    $materiaPrima->update($request->all());
    return response()->json([
        'ok' => true,
        'status' => 200,
        'message' => 'Updated MateriaPrima',
        'body' => $materiaPrima // Añadido
    ]);
    }

    public function destroy($materia_prima_id)
    {
        $materiaPrima = MateriaPrima::find($materia_prima_id);
    if (!$materiaPrima) {
        return response()->json([
            'ok' => false,
            'status' => 404,
            'message' => 'Materia Prima not found'
        ], 404);
    }

    $materiaPrima->delete();
    return response()->json([
        'ok' => true,
        'status' => 200,
        'message' => 'Deleted MateriaPrima'
    ]);
    }
}