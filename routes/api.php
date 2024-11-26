<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ClienteController, 
    CompraController, 
    ProductoController, 
    ProveedorController, 
    VentaController
};

// Estas rutas utilizan la convención de recursos, proporcionando CRUD completo para cada modelo.
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('compras', CompraController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('proveedores', ProveedorController::class);
Route::apiResource('ventas', VentaController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
