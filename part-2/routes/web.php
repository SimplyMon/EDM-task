<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'indexBlade'])->name('clients.index');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('/', [ClientController::class, 'storeBlade'])->name('clients.store');
    Route::put('/{id}', [ClientController::class, 'updateBlade'])->name('clients.update');
    Route::delete('/{id}', [ClientController::class, 'destroyBlade'])->name('clients.destroy');
});
