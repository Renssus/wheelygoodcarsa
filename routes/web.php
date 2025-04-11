<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function () {

    Route::resource('cars', CarController::class)->except(['show']);
    Route::get('/cars/create', [CarController::class, 'showAddCarForm'])->name('cars.show');
    Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store');

    Route::post('/cars/get-rdw-data', [CarController::class, 'getCarDataFromRdw'])->name('cars.get-rdw-data');

    Route::middleware('auth')->get('/my-cars', [CarController::class, 'index'])->name('cars.index');

    Route::middleware('auth')->get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');

});

require __DIR__.'/auth.php';
