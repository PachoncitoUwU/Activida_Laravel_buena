<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ruta por defecto (puedes dejarla o quitarla)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- TUS NUEVAS RUTAS ---
// Esta línea crea automáticamente las rutas para: 
// listar, crear, ver, actualizar y eliminar productos.
Route::apiResource('products', ProductController::class);