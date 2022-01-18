<?php

use App\Http\Controllers\AlmaController;
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

Route::get('/', [UserController::class, 'index']);

Route::get('/usuario/entrar', [UserController::class, 'showLoginForm'])->name('user.login');
Route::get('/usuario/sair', [UserController::class, 'logout'])->name('user.logout');
Route::post('/usuario/entrar/validacao', [UserController::class, 'login'])->name('user.login.do');
Route::resource('/usuario', UserController::class)
    ->names('user')
    ->parameters(['usuario' => 'user']);


Route::put('/ficha/caminho/{ficha}', [FichashitodamaController::class, 'caminho'])->name('sheet.caminho');
Route::put('/ficha/classe/{ficha}', [FichashitodamaController::class, 'classe'])->name('sheet.classe');
Route::put('/ficha/heranca/{ficha}', [FichashitodamaController::class, 'heranca'])->name('sheet.heranca');
Route::put('/ficha/vida/{ficha}', [FichashitodamaController::class, 'updatelife'])->name('sheet.updatelife');
Route::put('/ficha/despertado/{ficha}', [FichashitodamaController::class, 'updateawaken'])->name('sheet.updateawaken');
Route::put('/ficha/imagem/{ficha}', [FichashitodamaController::class, 'updateimage'])->name('sheet.updateimage');
Route::put('/ficha/dragao/{ficha}', [FichashitodamaController::class, 'updatedragon'])->name('sheet.updatedragon');
Route::put('/ficha/arma/{ficha}', [FichashitodamaController::class, 'updatearma'])->name('sheet.updatearma');
Route::resource('/ficha', FichashitodamaController::class)
    ->names('sheet');


Route::post('/ficha/alma', [AlmaController::class, 'store'])->name('soul.store');
Route::put('/ficha/alma/atualizar', [AlmaController::class, 'update'])->name('soul.update');
Route::delete('/ficha/alma/deletar', [AlmaController::class, 'destroy'])->name('soul.delete');