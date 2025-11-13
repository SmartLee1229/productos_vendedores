<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VendedorController;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::resource('productos', ProductoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('vendedores', VendedorController::class);
