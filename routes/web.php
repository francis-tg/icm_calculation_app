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
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/register', [UserController::class, 'index']);
});

Route::group([
    'middleware'=>'admin',
    'prefix'=>'admin'
],function ($router) {
    Route::resource('roles', RoleController::class);
    Route::resource('imcs', ImcController::class);
    Route::get('/', [UserController::class,'admin']);

});