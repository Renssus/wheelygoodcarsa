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

Route::get('/', [CarController::class, 'index'])->name('cars.index');
    Route::get('/RegisteerAuto/stap1', [CarController::class, 'showStep1'])->name('cars.step1');
    Route::post('/RegisteerAuto/stap1', [CarController::class, 'postStep1'])->name('cars.postStep1');
    Route::get('/RegisteerAuto/stap2', [CarController::class, 'showStep2'])->name('cars.step2');
    Route::post('/RegisteerAuto/stap2', [CarController::class, 'postStep2'])->name('cars.postStep2');
    Route::get('/RegisteerAuto/stap3', [CarController::class, 'showStep3'])->name('cars.step3');
    Route::post('/RegisteerAuto/stap3', [CarController::class, 'postStep3'])->name('cars.postStep3');
});

// go to login page if not logged in
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// car



require __DIR__.'/auth.php';
