<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UsuarioController::class, 'login']);

Route::middleware(['validateToken'])->group(function () {
Route::get('/materia_primas', [MateriaPrimaController::class, 'index']);
Route::get('/materia_primas/{id}', [MateriaPrimaController::class, 'show']);
Route::post('/materia_primas', [MateriaPrimaController::class, 'store']);
Route::put('/materia_primas/{id}', [MateriaPrimaController::class, 'update']);
Route::delete('/materia_primas/{id}', [MateriaPrimaController::class, 'destroy']);
Route::get('/pedidos', [PedidoController::class, 'index']);
Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/ventas', [VentaController::class, 'index']);
Route::get('/ventas/{id}', [VentaController::class, 'show']);
Route::post('/ventas', [VentaController::class, 'store']);
Route::put('/ventas/{id}', [VentaController::class, 'update']);
Route::delete('/ventas/{id}', [VentaController::class, 'destroy']);
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('/usuarios', [UsuarioController::class, 'store']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);
});