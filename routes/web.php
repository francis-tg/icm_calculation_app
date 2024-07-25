<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImcController;


Route::group([
    'prefix'=>'auth'
],function($router){
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/register', [UserController::class, 'index']);
    Route::post('/register', [UserController::class, 'store']);
});
Route::group([
    'middleware'=>'user',
],function($router){

    Route::get('/', [ImcController::class, 'index']);
    Route::post('/user/calculate', [ImcController::class, 'store']);
});

Route::group([
    'middleware'=>'admin',
    'prefix'=>'admin'
],function ($router) {
    Route::get('/imcs', [ImcController::class,'getAllImcs']);
    Route::get('/', [UserController::class,'admin']);
});