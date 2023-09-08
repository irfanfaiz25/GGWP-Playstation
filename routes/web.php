<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\TelevisionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard endpoints
// Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'page' => 'Dashboard'
    ]);
});


// Management endpoints
// Route::get('/dashboard/management', [ManagementController::class, 'index']);
Route::get('/dashboard/transaction', function () {
    return view('dashboard.transaction', [
        'page' => 'Transaction'
    ]);
});

// Data TV endpoints
Route::get('/dashboard/data-tv', [TelevisionsController::class, 'index']);
Route::resource('/dashboard/data-tv', TelevisionsController::class)->except(['create', 'show']);