<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\QuestoesController;
use App\Http\Controllers\RespostasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [QuizController::class, 'index'])
    ->name('index')->middleware(['auth']);;

Route::get('/quem-somos', function () {
    return view('quem-somos');})
    ->name('quem-somos')->middleware(['auth']);;

Route::get('/novo', [QuizController::class, 'create'])
    ->name('create')->middleware(['auth']);

Route::get('/{id}/ver', [QuizController::class, 'show'])
    ->name('show')->middleware(['auth']);

Route::get('/{id}/editar', [QuizController::class, 'edit'])
    ->name('edit')->middleware(['auth']);

Route::post('/cadastrar', [QuizController::class, 'store'])
    ->name('store')->middleware(['auth']);

Route::post('/{id}/atualizar', [QuizController::class, 'update'])
    ->name('update')->middleware(['auth']);

Route::get('/{id}/excluir', [QuizController::class, 'destroy'])
    ->name('destroy')->middleware(['auth']);

Route::get('/play/{id}/', [QuizController::class, 'play'])
    ->name('play')->middleware(['auth']);

Route::post('/play/confirma', [QuizController::class, 'corfirma_resposta'])
    ->name('corfirma_resposta')->middleware(['auth']);

Route::post('/pesquisa', [QuizController::class, 'pesquisar'])
    ->name('pesquisa')->middleware(['auth']);

Route::get('/listar', [QuizController::class, 'lista'])
    ->name('lista')->middleware(['auth']);;



    Route::prefix('questoes')->middleware(['auth'])->group(function () {
        Route::get('/',             [QuestoesController::class, 'index'])
                                    ->name('questoes.index');
        Route::get('/novo',         [QuestoesController::class, 'create'])
                                    ->name('questoes.create');
        Route::get('/{id}/ver',     [QuestoesController::class, 'show'])
                                    ->name('questoes.show');
        Route::get('/{id}/editar',  [QuestoesController::class, 'edit'])
                                    ->name('questoes.edit');
        Route::post('/cadastrar',   [QuestoesController::class, 'store'])
                                    ->name('questoes.store');
        Route::post('/{id}/atualizar', [QuestoesController::class, 'update'])
                                    ->name('questoes.update');
        Route::get('/{id}/excluir', [QuestoesController::class, 'destroy'])
                                    ->name('questoes.destroy');
    });
    
    Route::prefix('respostas')->middleware(['auth'])->group(function () {
        Route::get('/',             [RespostasController::class, 'index'])
                                    ->name('respostas.index');
        Route::get('/novo',         [RespostasController::class, 'create'])
                                    ->name('respostas.create');
        Route::get('/{id}/ver',     [RespostasController::class, 'show'])
                                    ->name('respostas.show');
        Route::get('/{id}/editar',  [RespostasController::class, 'edit'])
                                    ->name('respostas.edit');
        Route::post('/cadastrar',   [RespostasController::class, 'store'])
                                    ->name('respostas.store');
        Route::post('/{id}/atualizar', [RespostasController::class, 'update'])
                                    ->name('respostas.update');
        Route::get('/{id}/excluir', [RespostasController::class, 'destroy'])
                                    ->name('respostas.destroy');
    });
    
    Route::prefix('categorias')->middleware(['auth'])->group(function () {
        Route::get('/',             [CategoriasController::class, 'index'])
                                    ->name('categorias.index');
        Route::get('/novo',         [CategoriasController::class, 'create'])
                                    ->name('categorias.create');
        Route::get('/{id}/ver',     [CategoriasController::class, 'show'])
                                    ->name('categorias.show');
        Route::get('/{id}/editar',  [CategoriasController::class, 'edit'])
                                    ->name('categorias.edit');
        Route::post('/cadastrar',   [CategoriasController::class, 'store'])
                                    ->name('categorias.store');
        Route::post('/{id}/atualizar', [CategoriasController::class, 'update'])
                                    ->name('categorias.update');
        Route::get('/{id}/excluir', [CategoriasController::class, 'destroy'])
                                    ->name('categorias.destroy');
    });
    
    Route::prefix('user')->middleware(['auth'])->group(function () {
        Route::get('/rank',             [UserController::class, 'index'])
                                    ->name('user.index');
        Route::get('/{id}',      [UserController::class, 'show'])
                                    ->name('user.show');
        Route::get('/{id}/editar',      [UserController::class, 'editavatar'])
                                    ->name('avatar.edit');
        Route::post('/{id}/atualizar',   [UserController::class, 'updateavatar'])
                                    ->name('avatar.update');
    });

require __DIR__.'/auth.php';






    










