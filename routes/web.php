<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/cars/create', [CarController::class, 'showAddCarForm'])->name('cars.show');
    Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store');
});

require __DIR__.'/auth.php';
