<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sisvenController;

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
});
// Route::get('/index', function(){

//     return view('sisven.index');
// })->middleware(['auth', 'verified'])->name('sisven.index');

require __DIR__.'/auth.php';
