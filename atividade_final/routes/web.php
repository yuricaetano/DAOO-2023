<?php

use Illuminate\Support\Facades\Route;

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

Route:: get('imoveis', [\App\Http\Controllers\ImovelController::class, 'index']);
Route:: get('imovel/{id}', [\App\Http\Controllers\ImovelController::class, 'show']);
Route:: get('imovel', [\App\Http\Controllers\ImovelController::class, 'create'])-> name('imovel_create');
Route:: post('imovel', [\App\Http\Controllers\ImovelController::class, 'store']);
Route:: get('imovel/{id}/edit', [\App\Http\Controllers\ImovelController::class, 'edit'])-> name('imovel_edit');
Route:: post('imovel/{id}/update', [\App\Http\Controllers\ImovelController::class, 'update'])-> name('imovel_update');
Route:: get('imovel/{id}/delete', [\App\Http\Controllers\ImovelController::class, 'delete'])-> name('imovel_delete');
Route:: post('imovel/{id}/remove', [\App\Http\Controllers\ImovelController::class, 'remove'])-> name('imovel_remove');

Route:: get('roommates', [\App\Http\Controllers\RoommateController::class, 'index']);
Route:: get('roommate/{id}', [\App\Http\Controllers\RoommateController::class, 'show']);
Route:: get('roommate', [\App\Http\Controllers\RoommateController::class, 'create'])-> name('roommate_create');
Route:: post('roommate', [\App\Http\Controllers\RoommateController::class, 'store']);
Route:: get('roommate/{id}/edit', [\App\Http\Controllers\RoommateController::class, 'edit'])-> name('roommate_edit');
Route:: post('roommate/{id}/update', [\App\Http\Controllers\RoommateController::class, 'update'])-> name('roommate_update');
Route:: get('roommate/{id}/delete', [\App\Http\Controllers\RoommateController::class, 'delete'])-> name('roommate_delete');
Route:: post('roommate/{id}/remove', [\App\Http\Controllers\RoommateController::class, 'remove'])-> name('roommate_remove');

Route:: get('proprietarios', [\App\Http\Controllers\ProprietarioController::class, 'index']);
Route:: get('proprietario/{id}', [\App\Http\Controllers\ProprietarioController::class, 'show']);
Route:: get('proprietario', [\App\Http\Controllers\ProprietarioController::class, 'create'])-> name('proprietario_create');
Route:: post('proprietario', [\App\Http\Controllers\ProprietarioController::class, 'store']);
Route:: get('proprietario/{id}/edit', [\App\Http\Controllers\ProprietarioController::class, 'edit'])-> name('proprietario_edit');
Route:: post('proprietario/{id}/update', [\App\Http\Controllers\ProprietarioController::class, 'update'])-> name('proprietario_update');
Route:: get('proprietario/{id}/delete', [\App\Http\Controllers\ProprietarioController::class, 'delete'])-> name('proprietario_delete');
Route:: post('proprietario/{id}/remove', [\App\Http\Controllers\ProprietarioController::class, 'remove'])-> name('proprietario_remove');
