<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Account\FilterController as FilterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

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
    Route::get('/account', [AccountController::class,'filter'])->name('account');
    Route::get('/filter', [AccountController::class,'filter'])->name('filter');


    Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function () {
        Route::get('/all', [AccountController::class,'filter'])->name('all');
    });

});

Route::group(['prefix' => '/task'], function () {
    Route::post('/', [TaskController::class, 'store'])->name('create-task');
    Route::post('/{id}', [TaskController::class, 'update'])->name('update-task');
    Route::post('/destroy/{id}', [TaskController::class, 'destroy'])->name('destroy-task');
   Route::get('/show', [TaskController::class, 'show'])->name('show-task');
});


//Route::get('/active', [MainController::class, 'active']);
//Route::get('/completed', [MainController::class, 'completed']);
//
//Route::get('/auth', [AuthController::class, 'create'])->name('check');
//Route::post('/auth/check',[AuthController::class, 'auth_check']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
