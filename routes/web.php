<?php

use App\Http\Controllers\Account\IndexController as AccountController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');


    Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function () {
        Route::get('/', [MainController::class, 'all']);
    });

});
Route::get('/active', [MainController::class, 'active']);
Route::get('/completed', [MainController::class, 'completed']);

Route::get('/auth', [AuthController::class, 'create'])->name('check');
Route::post('/auth/check',[AuthController::class, 'auth_check']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
