<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth', 'prefix'=>'dashboard'], function(){
    Route::get('/links', [LinkController::class, 'index']);
    Route::get('/links/new', [LinkController::class, 'create']);
    Route::post('/links/new', [LinkController::class, 'store']);
    Route::get('/links/{link}', [LinkController::class, 'edit']);
    Route::post('links/{link}', [LinkController::class, 'update']);
    Route::delete('links/{link}', [LinkController::class, 'destroy']);

    Route::get('/settings', [UserController::class, 'edit']);
    Route::post('/settings', [UserController::class, 'update']);
});

Route::post('/visit/{link}', [VisitController::class, 'store']);
Route::get('/{user}', [UserController::class, 'show'])->name('portfolio');


Route::get('/home', [HomeController::class, 'index'])->name('home');
