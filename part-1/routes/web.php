<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

//  Question 1: Eloquent Query
// $activeUsers = User::where('status', 'active')
//     ->orderBy('created_at', 'desc')
//     ->get();

// Question 2: Route with auth middleware
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Middleware i used is auth a built in middleware
// Reason is it ensures that only authenticated users can access the /dashboard route.
// If a user is not logged in, Laravel redirects them to the 'login' route.

// Question 3: Store client details
Route::post('/clients', [ClientController::class, 'storeClientDetails']);

Route::get('/clients', function () {
    return view('clients');
});
