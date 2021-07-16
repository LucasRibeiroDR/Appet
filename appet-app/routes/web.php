<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

// Rota de entrada do software assim que aberto cai nessa rota
Route::get('/', [HomeController::class, 'index'])->name('index');

/************************** Cadastro Usuários **************************/
// Grupo de rotas de mesmo prefixo
Route::prefix('user')->group(function() {
    // Grupo de rotas de mesmo nome
    Route::name('user.')->group(function() {
        // Rotas para cadastro do cliente
        Route::get('/create',[UserController::class, 'create'])->name('create');
        // Route::get('/{id}',[UserController::class, 'show'])->name('show');
        // Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        // Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        // Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });
});

/************************** Cadastro Pets **************************/
//Grupo de rotas autenticadas | mesmo prefixo | mesmo name
Route::group([
    'middleware' => [], //Colocar 'auth' no array quando estiver tudo certo essa parte
    'prefix' => 'pets',
    'name' => 'pets.'
    ], function(){
    // Rotas CRUD pets
    Route::get('/create', [PetsController::class, 'create'])->name('create');
    // Route::get('/{id}', [PetsController::class, 'show'])->name('show');
    // Route::get('/edit/{id}', [PetsController::class, 'edit'])->name('edit');
    // Route::put('/update/{id}', [PetsController::class, 'update'])->name('update');
    // Route::delete('/{id}', [PetsController::class, 'destroy'])->name('delete');
});

/**
 * 4 tipos de grupos de rotas mais utilizados em laravel:
 * para autenticação -> Route::middleware(['auth'])
 * para mesmo prefixo -> Route::prefix('clinic')
 * para mesmo namespace(nome de pasta ex) -> Route::namespace('Admin')
 * para o nome da rota -> Route::name('clinic.')
 * 
 * grupo mais completo para melhor visualização
 * Route::group([
 *  'middleware' => [],
 *  'prefix' => 'admin',
 *  'namespace' => 'Admin',
 *  'name' => 'clinic.'
 * ], function(){
 * 
 * });
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
