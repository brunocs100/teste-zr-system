<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', CadastroController::class . '@index')->name('cadastro.index');
Route::get('/cadastro/lista', CadastroController::class . '@lista')->name('cadastro.lista');
Route::get('/cadastro', CadastroController::class . '@cadastro')->name('cadastro.cadastro');
Route::post('/cadastro/finalizar', CadastroController::class . '@campos')->name('cadastro.campos');
Route::post('/store', CadastroController::class . '@store')->name('cadastro.store');
Route::post('/edit/{id}', CadastroController::class . '@edit')->name('event.edit');
