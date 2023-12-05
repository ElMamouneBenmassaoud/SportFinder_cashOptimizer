<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeController;

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

Route::get('/', [ChangeController::class, 'calculateChange'])->name('change-form');
Route::post('/calculate-change', [ChangeController::class, 'calculateChange'])->name('calculate-change');
