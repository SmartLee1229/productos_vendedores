<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::resource('productos', ProductoController::class)->parameters([
    'productos' => 'producto'
]);

Route::resource('vendedores', VendedorController::class)->parameters([
    'vendedores' => 'vendedor'
]);

Route::resource('categorias', CategoriaController::class)->parameters([
    'categorias' => 'categoria'
]);
