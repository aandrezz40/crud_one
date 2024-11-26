<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('home', [ProductoController::class, 'home'])->name('home');
    Route::post('home', [ProductoController::class, 'createProduct'])->name('createProducts');
    Route::put('home/edit/{id}', [ProductoController::class, 'updateProducto'])->name('editProduct');
    Route::put('home/delete/{id}', [ProductoController::class, 'destroyProducto'])->name('deleteProduct');


    //Controlador de proveedor
    Route::get('/proveedor',[ProveedorController::class,'index'])->name('proveedor');
    Route::post('/proveedor',[ProveedorController::class,'createProveedor'])->name('createProveedors');
    Route::get('/proveedor/edit{id}',[ProveedorController::class,'updateProveedor'])->name('editProveedor');
    Route::get('/proveedor/delete/{id}',[ProveedorController::class,'deleteProveedor'])->name('deleteProveedor');


    //Controlador de categoria
    Route::get('/categoria',[CategoriaController::class,'index'])->name('categoria');
    Route::post('/categoria',[CategoriaController::class,'createCategory'])->name('createCategory');
    Route::get('/categoria/edit{id}',[CategoriaController::class,'setCategory'])->name('editCategory');
    Route::get('/categoria/delete/{id}',[CategoriaController::class,'deleteCategory'])->name('deleteCategory');
});

require __DIR__.'/auth.php';
