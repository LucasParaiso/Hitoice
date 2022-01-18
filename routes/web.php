<?php

use App\Http\Controllers\AlmaController;
use App\Http\Controllers\FichasgenericasController;
use App\Http\Controllers\FichashitodamaController;
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
Route::put('/hitodama/caminho/{fichashitodama}', [FichashitodamaController::class, 'caminho'])->name('hitodama.caminho');
Route::put('/hitodama/classe/{fichashitodama}', [FichashitodamaController::class, 'classe'])->name('hitodama.classe');
Route::put('/hitodama/heranca/{fichashitodama}', [FichashitodamaController::class, 'heranca'])->name('hitodama.heranca');
Route::put('/hitodama/vida/{fichashitodama}', [FichashitodamaController::class, 'updatelife'])->name('hitodama.updatelife');
Route::put('/hitodama/despertado/{fichashitodama}', [FichashitodamaController::class, 'updateawaken'])->name('hitodama.updateawaken');
Route::put('/hitodama/imagem/character/{fichashitodama}', [FichashitodamaController::class, 'updateImageCharacter'])->name('hitodama.updateimagecharacter');
Route::put('/hitodama/imagem/dragon/{fichashitodama}', [FichashitodamaController::class, 'updateImageDragon'])->name('hitodama.updateimagedragon');
Route::put('/hitodama/dragao/{fichashitodama}', [FichashitodamaController::class, 'updatedragon'])->name('hitodama.updatedragon');
Route::put('/hitodama/arma/{fichashitodama}', [FichashitodamaController::class, 'updatearma'])->name('hitodama.updatearma');
Route::resource('/hitodama', FichashitodamaController::class)
    ->names('hitodama')
    ->parameters(['hitodama' => 'fichashitodama']);

Route::post('/hitodama/alma', [AlmaController::class, 'store'])->name('hitodama.soul.store');
Route::put('/hitodama/alma/atualizar', [AlmaController::class, 'update'])->name('hitodama.soul.update');
Route::delete('/hitodama/alma/deletar', [AlmaController::class, 'destroy'])->name('hitodama.soul.delete');

// FICHA GENERICA
Route::resource('/generica', FichasgenericasController::class)
    ->names('generica')
    ->parameters(['generica' => 'fichasgenerica']);
