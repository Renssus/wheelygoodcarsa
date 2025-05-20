<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarController;

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// car

Route::get('/', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/multistep/step1', [CarController::class, 'showStep1'])->name('cars.step1');


require __DIR__.'/auth.php';
