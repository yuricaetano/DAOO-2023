<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {


    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class)->parameters([
        'users' => 'user'
    ]);

    Route::apiResource('imoveis', \App\Http\Controllers\Api\ImovelController::class)->parameters([
        'imoveis' => 'imovel'
    ]);

    Route::post('logout', [\App\Http\Controllers\Api\LoginController::class, 'logout']);

});

Route::middleware(['auth:sanctum', 'role:manager'])->group(function () {


    Route::apiResource('proprietarios', \App\Http\Controllers\Api\ProprietarioController::class)->parameters([
        'proprietarios' => 'proprietario'
    ]);

    Route::post('logout', [\App\Http\Controllers\Api\LoginController::class, 'logout']);

});

Route::middleware(['auth:sanctum', 'role:client, admin'])->group(function () {


    Route::controller(\App\Http\Controllers\Api\RoommateController::class)->group(function (){
        Route::get('roommates', 'index');
        Route::get('roommates/{roommate}', 'show');
        Route::get('roommates/{roommate}/imoveis', [\App\Http\Controllers\Api\RoommateController::class, 'roommates'])->name('roommates.imoveis');
        Route::get('roommates/{roommate}/proprietarios', [\App\Http\Controllers\Api\RoommateController::class, 'roommatesContrato'])->name('roommates.contratos');

    });
    Route::put('/users/{user}', [\App\Http\Controllers\Api\UserController::class, 'update']);

    Route::post('logout', [\App\Http\Controllers\Api\LoginController::class, 'logout']);

});





Route::post('users', [\App\Http\Controllers\Api\UserController::class,'store']);
Route::post('login', [\App\Http\Controllers\Api\LoginController::class, 'login'])->name('login');;

