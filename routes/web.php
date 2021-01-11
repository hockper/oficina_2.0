<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adicionar', [OrcamentoController::class, 'indexAdicionar'])->name('adicionar');
Route::post('/adicionar', [OrcamentoController::class, 'salvar'])->name('salvar');
Route::get('/pesquisar', [OrcamentoController::class, 'indexPesquisar'])->name('pesquisar');
Route::post('/pesquisar', [OrcamentoController::class, 'resultado'])->name('resultado');
Route::get('/editar/{id}', [OrcamentoController::class, 'editar'])->name('editar');
Route::put('/atualizar/{id}', [OrcamentoController::class, 'atualizar'])->name('atualizar');
Route::get('/deletar/{id}', [OrcamentoController::class, 'deletar'])->name('deletar');
