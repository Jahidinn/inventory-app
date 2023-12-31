<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'autenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/apps', [AppsController::class, 'index'])->middleware('auth');
Route::resource('/apps/items', ItemsController::class)->middleware('auth');
Route::resource('/apps/categories', CategoryController::class)->middleware('auth');
Route::resource('/apps/units', UnitController::class)->middleware('auth');
Route::get('/apps/qr-code', [AppsController::class, 'qrcode'])->middleware('auth');

Route::get('/export-pdf', [ItemsController::class, 'exportPdf'])->middleware('auth');
Route::get('/export-excel/{category_id}', [ItemsController::class, 'exportExcel'])->middleware('auth');

Route::get('/export', [ItemsController::class, 'exportPdf2'])->middleware('auth');

Route::post('/excel-import', [ExcelController::class, 'index']);
Route::get('/excel-export', [ExcelController::class, 'exportData']);
