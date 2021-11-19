<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'home']);
Route::get('/active', [MainController::class, 'active']);
Route::get('/completed', [MainController::class, 'completed']);

Route::post('/auth/check', [AuthController::class, 'auth_check'])->name('check');