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

Route:: get('alo', [\App\Http\Controllers\homeController::class, 'index']);

Route:: get('produtos', [\App\Http\Controllers\ProdutoController::class, 'index']);
Route:: get('produto/{id}', [\App\Http\Controllers\ProdutoController::class, 'show']);
Route:: get('produto', [\App\Http\Controllers\ProdutoController::class, 'create'])-> name('produto_create');
Route:: post('produto', [\App\Http\Controllers\ProdutoController::class, 'store']);
Route:: get('produto/{id}/edit', [\App\Http\Controllers\ProdutoController::class, 'edit'])-> name('produto_edit');
Route:: post('produto/{id}/update', [\App\Http\Controllers\ProdutoController::class, 'update'])-> name('produto_update');
Route:: get('produto/{id}/delete', [\App\Http\Controllers\ProdutoController::class, 'delete'])-> name('produto_delete');
Route:: post('produto/{id}/remove', [\App\Http\Controllers\ProdutoController::class, 'remove'])-> name('produto_remove');


Route:: get('imovels', [\App\Http\Controllers\ImovelController::class, 'index']);
Route:: get('imovel/{id}', [\App\Http\Controllers\ImovelController::class, 'show']);
Route:: get('imovel', [\App\Http\Controllers\ImovelController::class, 'create'])-> name('imovel_create');
Route:: post('imovel', [\App\Http\Controllers\ImovelController::class, 'store']);
Route:: get('imovel/{id}/edit', [\App\Http\Controllers\ImovelController::class, 'edit'])-> name('imovel_edit');
Route:: post('imovel/{id}/update', [\App\Http\Controllers\ImovelController::class, 'update'])-> name('imovel_update');
Route:: get('imovel/{id}/delete', [\App\Http\Controllers\ImovelController::class, 'delete'])-> name('imovel_delete');
Route:: post('imovel/{id}/remove', [\App\Http\Controllers\ImovelController::class, 'remove'])-> name('imovel_remove');

Route:: get('clientes', [\App\Http\Controllers\ClienteController::class, 'index']);
Route:: get('cliente/{id}', [\App\Http\Controllers\ClienteController::class, 'show']);
Route:: get('cliente', [\App\Http\Controllers\ClienteController::class, 'create'])-> name('cliente_create');
Route:: post('cliente', [\App\Http\Controllers\ClienteController::class, 'store']);
Route:: get('cliente/{id}/edit', [\App\Http\Controllers\ClienteController::class, 'edit'])-> name('cliente_edit');
Route:: post('cliente/{id}/update', [\App\Http\Controllers\ClienteController::class, 'update'])-> name('cliente_update');
Route:: get('cliente/{id}/delete', [\App\Http\Controllers\ClienteController::class, 'delete'])-> name('cliente_delete');
Route:: post('cliente/{id}/remove', [\App\Http\Controllers\ClienteController::class, 'remove'])-> name('cliente_remove');

Route:: get('contratos', [\App\Http\Controllers\ContratoController::class, 'index']);
Route:: get('contrato/{id}', [\App\Http\Controllers\ContratoController::class, 'show']);
Route:: get('contrato', [\App\Http\Controllers\ContratoController::class, 'create'])-> name('contrato_create');
Route:: post('contrato', [\App\Http\Controllers\ContratoController::class, 'store']);
Route:: get('contrato/{id}/edit', [\App\Http\Controllers\ContratoController::class, 'edit'])-> name('contrato_edit');
Route:: post('contrato/{id}/update', [\App\Http\Controllers\ContratoController::class, 'update'])-> name('contrato_update');
Route:: get('contrato/{id}/delete', [\App\Http\Controllers\ContratoController::class, 'delete'])-> name('contrato_delete');
Route:: post('contrato/{id}/remove', [\App\Http\Controllers\ContratoController::class, 'remove'])-> name('contrato_remove');
