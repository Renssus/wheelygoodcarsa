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
Route::get('/RegisteerAuto/stap1', [CarController::class, 'showStep1'])->name('cars.step1');
Route::post('/RegisteerAuto/stap1', [CarController::class, 'postStep1'])->name('cars.postStep1');
Route::get('/RegisteerAuto/step2', [CarController::class, 'showStep2'])->name('cars.step2');
Route::post('/RegisteerAuto/step2', [CarController::class, 'postStep2'])->name('cars.postStep2');

require __DIR__.'/auth.php';
