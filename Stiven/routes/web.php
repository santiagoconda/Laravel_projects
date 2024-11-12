<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sisvenController;
use App\Http\Controllers\customController;
use App\Http\Controllers\invoiceController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('products/create', [sisvenController::class, 'create'])->name('products.create');
    Route::post('products', [sisvenController::class, 'store'])->name('products.store');
    Route::get('products', [sisvenController::class, 'index'])->name('sisven.index');
    Route::delete('/products/{id}', [sisvenController::class, 'destroy'])->name('products.destroy');
    // Route::delete('/comuna/{comuna}',[ComunaController::class,'destroy'])->name('comuna.destroy');


    Route::get('custom', [customController::class, 'index'])->name('sisven.getClientes');
    Route::get('custom/create', [customController::class, 'create'])->name('custom.create');
    Route::post('custom', [customController::class, 'store'])->name('custom.store');
    
    Route::get('invoice/create', [invoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice',[invoiceController::class, 'store'])->name('invoice.store');
});
// Route::get('/index', function(){

//     return view('sisven.index');
// })->middleware(['auth', 'verified'])->name('sisven.index');

require __DIR__.'/auth.php';
