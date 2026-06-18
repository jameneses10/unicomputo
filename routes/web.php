<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('productos.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class)->except(['show']);
});

require __DIR__.'/auth.php';
