<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\AnimalController;

// Rota de entrada do software assim que aberto cai nessa rota
Route::get('/', [HomeController::class, 'index'])->name('index');

/************************** Cadastro Usuários **************************/
// Grupo de rotas de mesmo prefixo
Route::prefix('user')->group(function() {
    // Grupo de rotas de mesmo nome
    Route::name('user.')->group(function() {
        // Rotas para cadastro do cliente
        Route::get('/register',[UserController::class, 'register'])->name('register');
        // Route::get('/{id}',[UserController::class, 'show'])->name('show');
        // Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        // Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        // Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });
});

<<<<<<< HEAD
/************************** Cadastro Pets **************************/
//Grupo de rotas autenticadas | mesmo prefixo | mesmo name
Route::group([
    'middleware' => [], //Colocar 'auth' no array quando estiver tudo certo essa parte
    'prefix' => 'pets',
    'name' => 'pets.'
    ], function(){
    // Rotas CRUD pets
    Route::get('/register', [PetsController::class, 'register'])->name('register');
    Route::get('/{id}', [PetsController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [PetsController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [PetsController::class, 'update'])->name('update');
    Route::delete('/{id}', [PetsController::class, 'destroy'])->name('delete');
=======
// Grupo de rotas para animas mas fora do middleware pois n tem verificação de autenticação
Route::prefix('animals')->group(function() {
        Route::name('animals.')->group(function() {
            Route::get('/create', [AnimalController::class, 'create'])->name('create');
        });
});

//Grupo de rotas autenticadas 
Route::middleware(['auth'])->group(function() {
    // para rotas que necessitam da autenticação
    
   /* CRUD PETs -> Só cliente autenticados que no 
       caso cadastrados podem relaziar o cadastro do pet
    * create -> add
    * read -> show
    * update -> update
    * delete -> delete
    */

>>>>>>> 84730d5bdbce728672b14cadb5082d425c12a534
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