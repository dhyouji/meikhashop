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
use App\Http\Controllers\PreorderController;
use App\Http\Controllers\ProductionController;
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

Route::get('preorder/create1', [App\Http\Controllers\PreorderController::class, 'create1'])->name('preorder.create1')->middleware('web');
Route::get('preorder/create2', [App\Http\Controllers\PreorderController::class, 'create2'])->name('preorder.create2')->middleware('web');
Route::get('preorder/create3', [App\Http\Controllers\PreorderController::class, 'create3'])->name('preorder.create3')->middleware('web');
Route::post('preorder/postcreate1', [App\Http\Controllers\PreorderController::class, 'postcreate1'])->name('preorder.postcreate1')->middleware('web');
Route::post('preorder/postcreate2', [App\Http\Controllers\PreorderController::class, 'postcreate2'])->name('preorder.postcreate2')->middleware('web');
Route::post('preorder/postcreate3', [App\Http\Controllers\PreorderController::class, 'postcreate3'])->name('preorder.postcreate3')->middleware('web');

Route::group(['middleware' => ['user-access:1','user-access:1'] ], function(){
    Route::resources([
        'user' => UserController::class,
        'sbtype' => SbtypeController::class,
        'sbsize' => SbsizeController::class,
        'sbpattern' => SbpatternController::class,
        'sbfillw' => SbfillwController::class,
        'customer' => CustomerController::class,
        'preorder' => PreorderController::class,
        'prod' => ProductionController::class,
    ]);
});