<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('productos.index');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Ruta de perfil
|--------------------------------------------------------------------------
| Esta ruta se agrega porque el menú de Laravel está buscando route('profile')
*/
Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::resource('productos', ProductoController::class)->except(['show']);
});

require __DIR__.'/auth.php';