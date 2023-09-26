<?php

use App\Http\Controllers\CalculationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SearchDataFinance;
use App\Http\Controllers\SearchPurchaseController;
use App\Http\Controllers\TelevisionsController;
use App\Http\Controllers\TransactionController;
use App\Models\Calculation;
use App\Models\Expenditure;
use App\Models\Income;
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


// Transation endpoints
Route::get('/dashboard/transaction', [TransactionController::class, 'index']);
Route::get('/search', [SearchPurchaseController::class, 'fetchData']);
Route::get('dashboard/transaction/delete-order/{id}', [CalculationController::class, 'hapusOrder']);
Route::post('/dashboard/transaction/start/', [TransactionController::class, 'updateStartPlay'])->name('updateStartPlay');
Route::post('/dashboard/transaction/end', [TransactionController::class, 'updateEndPlay'])->name('updateEndPlay');
Route::post('/dashboard/transaction/tambahan', [TransactionController::class, 'menuTambahan'])->name('menuTambahan');
Route::post('/dashboard/transaction/pay', [TransactionController::class, 'paymentUpdate'])->name('paymentUpdate');


// Data TV endpoints
Route::get('/dashboard/data-tv', [TelevisionsController::class, 'index'])->name('ShowDataTV');
Route::resource('/dashboard/data-tv', TelevisionsController::class)->except(['create', 'show']);


// Data Menu endpoints
Route::get('/dashboard/data-menu', [MenuController::class, 'index'])->name('ShowDataMenu');
Route::resource('/dashboard/data-menu', MenuController::class);


// Data finance endpoints
Route::get('/dashboard/data-finance', [IncomeController::class, 'index']);
Route::resource('/dashboard/data-finance/expend', ExpenditureController::class)->except(['index', 'show', 'create', 'edit']);
Route::put('/dashboard/data-finance/angkringan/{id}', [IncomeController::class, 'updateIncomeAngkringan']);
Route::delete('/dashboard/data-finance/angkringan/{id}', [IncomeController::class, 'deleteIncomeAngkringan']);
Route::put('/dashboard/data-finance/ps/{id}', [IncomeController::class, 'updateIncomePs']);
Route::delete('/dashboard/data-finance/ps/{id}', [IncomeController::class, 'deleteIncomePs']);
Route::get('/incomeps', [SearchDataFinance::class, 'fetchDataIncomePs']);
Route::get('/incomeangkringan', [SearchDataFinance::class, 'fetchDataIncomeAngkringan']);
Route::get('/expend', [SearchDataFinance::class, 'fetchDataExpend']);