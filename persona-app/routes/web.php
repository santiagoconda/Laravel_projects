<?php
use App\Http\Controllers\ComunaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get("/comuna", [ComunaController::class, 'index'])->name('comuna.index');
    Route::post("/comuna", [ComunaController::class, 'store'])->name('comuna.store');
    Route::get('/comuna/create',[ComunaController::class,'create'])->name('comuna.create');
    Route::delete('/comuna/{comuna}',[ComunaController::class,'destroy'])->name('comuna.destroy');
    Route::put('/comuna/{comuna}',[ComunaController::class,'update'])->name('comuna.update');
    Route::get('/comunas/{comuna}/edit',[ComunaController::class,'edit'])->name('comuna.edit');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
