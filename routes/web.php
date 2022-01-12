<?php

use App\Http\Controllers\FichaController;
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

Route::get('/', [FichaController::class, 'index']);

Route::get('/usuario/entrar', [UserController::class, 'showLoginForm'])->name('user.login');
Route::get('/usuario/sair', [UserController::class, 'logout'])->name('user.logout');
Route::post('/usuario/entrar/validacao', [UserController::class, 'login'])->name('user.login.do');
Route::resource('/usuario', UserController::class) 
    ->names('user')
    ->parameters(['usuario' => 'user']);


Route::post('/ficha/caminho/{ficha}', [FichaController::class, 'caminho'])->name('sheet.caminho');
Route::post('/ficha/classe/{ficha}', [FichaController::class, 'classe'])->name('sheet.classe');
Route::post('/ficha/heranca/{ficha}', [FichaController::class, 'heranca'])->name('sheet.heranca');
Route::post('/ficha/vida/{ficha}', [FichaController::class, 'updatelife'])->name('sheet.updatelife');
Route::post('/ficha/despertado/{ficha}', [FichaController::class, 'updateawaken'])->name('sheet.updateawaken');
Route::post('/ficha/imagem/{ficha}', [FichaController::class, 'updateimage'])->name('sheet.updateimage');
Route::post('/ficha/dragao/{ficha}', [FichaController::class, 'updatedragon'])->name('sheet.updatedragon');
Route::resource('/ficha', FichaController::class) 
    ->names('sheet');   