<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SbfillwController;
use App\Http\Controllers\SbpatternController;
use App\Http\Controllers\SbsizeController;
use App\Http\Controllers\SbtypeController;
use App\Http\Controllers\CustomerController;
/*
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['user-access:1','user-access:1'] ], function(){
    Route::resources([
        'user' => UserController::class,
        'sbtype' => SbtypeController::class,
        'sbsize' => SbsizeController::class,
        'sbpattern' => SbpatternController::class,
        'sbfillw' => SbfillwController::class,
        'customer' => CustomerController::class,
    ]);
});