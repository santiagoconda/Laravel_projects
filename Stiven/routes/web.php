<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sisvenController;
use App\Http\Controllers\customController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\detailsController;
use App\Http\Controllers\cotrolador1;


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
    Route::delete('/profile', [ProfileController::class, 'delete'])->name('profile.destroy');
    
    Route::get('products/create', [sisvenController::class, 'create'])->name('products.create');
    Route::post('products', [sisvenController::class, 'store'])->name('products.store');
    Route::get('products', [sisvenController::class, 'index'])->name('sisven.index');
    Route::delete('/products/{id}', [sisvenController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{id}',[sisvenController::class,'update'])->name('products.update');
    Route::get('/products/{id}/edit',[sisvenController::class,'edit'])->name('products.edit');

    Route::get('custom', [customController::class, 'index'])->name('sisven.getClientes');
    Route::get('custom/create', [customController::class, 'create'])->name('custom.create');
    Route::post('custom', [customController::class, 'store'])->name('custom.store');
    Route::put('/custom/{id}',[customController::class,'update'])->name('custom.update');
    Route::get('/custom/{id}/edit',[customController::class,'edit'])->name('custom.edit');
    Route::delete('/custom/{id}', [customController::class, 'destroy'])->name('custom.destroy');

    Route::get('/invoices', [invoiceController::class, 'index'])->name('sisven.facturas');
    Route::get('invoice/create', [invoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice',[invoiceController::class, 'store'])->name('invoice.store');
    Route::get('/facturas/{id}', [invoiceController::class, 'show'])->name('invoice.show');
    Route::delete('/invoice/{id}',[invoiceController::class, 'destroy'])->name('invoice.destroy');

    Route::get('/details', [detailsController::class, 'index'])->name('detail.index');
    Route::get('/details/create', [detailsController::class, 'create'])->name('detail.create');
    Route::post('detail', [detailsController::class, 'store'])->name('detail.store');

    Route::get('/combined', [cotrolador1::class, 'index'])->name('forms');



});

require __DIR__.'/auth.php';
