<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;

Route::get('/productos', function () {
    return response()->json([
        'success' => true,
        'message' => 'Listado de productos',
        'data' => Producto::all()
    ]);
});