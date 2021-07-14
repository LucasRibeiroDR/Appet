<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultController;

// Rota de entrada do software assim que aberto cai nessa rota
Route::get('/', function () {
    return view('welcome');
})->name('index');


// Grupo de rotas de mesmo prefixo
Route::prefix('clinic')->group(function() {
    // Grupo de rotas de mesmo nome
    Route::name('clinic.')->group(function() {
        // Rotas para cadastro do cliente
        Route::get('/register',[ConsultController::class, 'register'])
        ->name('register');
        Route::get('/{id}',[ConsultController::class, 'show'])
        ->name('show');
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
    * elete -> delete
    */

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