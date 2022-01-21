<?php

use App\Http\Controllers\AlmaController;
use App\Http\Controllers\FichasgenericasController;
use App\Http\Controllers\FichasshinigamiController;
use App\Http\Controllers\FichasyokaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('/');

Route::get('/usuario/entrar', [UserController::class, 'showLoginForm'])->name('user.login');
Route::get('/usuario/sair', [UserController::class, 'logout'])->name('user.logout');
Route::post('/usuario/entrar/validacao', [UserController::class, 'login'])->name('user.login.do');
Route::resource('/usuario', UserController::class)
    ->names('user')
    ->parameters(['usuario' => 'user']);

// FICHA HITODAMA
Route::put('/shinigami/caminho/{fichasshinigami}', [FichasshinigamiController::class, 'caminho'])->name('shinigami.caminho');
Route::put('/shinigami/classe/{fichasshinigami}', [FichasshinigamiController::class, 'classe'])->name('shinigami.classe');
Route::put('/shinigami/heranca/{fichasshinigami}', [FichasshinigamiController::class, 'heranca'])->name('shinigami.heranca');
Route::put('/shinigami/vida/{fichasshinigami}', [FichasshinigamiController::class, 'updatelife'])->name('shinigami.updatelife');
Route::put('/shinigami/despertado/{fichasshinigami}', [FichasshinigamiController::class, 'updateawaken'])->name('shinigami.updateawaken');
Route::put('/shinigami/imagem/character/{fichasshinigami}', [FichasshinigamiController::class, 'updateImageCharacter'])->name('shinigami.updateimagecharacter');
Route::put('/shinigami/imagem/dragon/{fichasshinigami}', [FichasshinigamiController::class, 'updateImageDragon'])->name('shinigami.updateimagedragon');
Route::put('/shinigami/dragao/{fichasshinigami}', [FichasshinigamiController::class, 'updatedragon'])->name('shinigami.updatedragon');
Route::put('/shinigami/arma/{fichasshinigami}', [FichasshinigamiController::class, 'updatearma'])->name('shinigami.updatearma');
Route::resource('/shinigami', FichasshinigamiController::class)
    ->names('shinigami')
    ->parameters(['shinigami' => 'fichasshinigami']);

Route::post('/shinigami/alma', [AlmaController::class, 'store'])->name('shinigami.soul.store');
Route::put('/shinigami/alma/atualizar', [AlmaController::class, 'update'])->name('shinigami.soul.update');
Route::delete('/shinigami/alma/deletar', [AlmaController::class, 'destroy'])->name('shinigami.soul.delete');

// FICHA GENERICA
Route::resource('/generica', FichasgenericasController::class)
    ->names('generica')
    ->parameters(['generica' => 'fichasgenerica']);

// FICHA YOKAI
Route::resource('/yokai', FichasyokaiController::class)
    ->names('yokai')
    ->parameters(['yokai' => 'fichasyokai']);
