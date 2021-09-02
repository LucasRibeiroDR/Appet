<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AdminController;

// Rota de entrada do software assim que aberto cai nessa rota
Route::get('/', [HomeController::class, 'index'])->name('index');

/************************** Cadastro Usuários **************************/
Route::middleware(['auth'])->group(function() {
    // Grupo de rotas de mesmo prefixo
    Route::prefix('users')->group(function() {
        // Grupo de rotas de mesmo nome
        Route::name('users.')->group(function() {
            // Rotas para cadastro do cliente
            Route::post('/', [UserController::class, 'store']);
            Route::get('/create',[UserController::class, 'create'])->name('create');
            Route::get('/show',[UserController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
            Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        });
    });
});

/************************** Cadastro Pets **************************/
//Grupo de rotas autenticadas | mesmo prefixo | mesmo name
Route::group([
    'middleware' => ['auth'], //Colocar 'auth' no array quando estiver tudo certo essa parte
    'prefix' => 'pets',
    'name' => 'pets.'
    ], function(){
    // Rotas CRUD pets
    Route::post('/', [PetsController::class, 'store']);
    Route::get('/create', [PetsController::class, 'create'])->name('create');
    Route::get('/show', [PetsController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [PetsController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [PetsController::class, 'update'])->name('update');
    Route::delete('/{id}', [PetsController::class, 'destroy'])->name('delete');
});
/************************** Agendamentos **************************/
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'appointments',
    'name' => 'appointments.'
    ], function(){
    Route::post('/', [AppointmentsController::class, 'store']);
    Route::get('/create', [AppointmentsController::class, 'create'])->name('create');
    Route::get('/show', [AppointmentsController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [AppointmentsController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [AppointmentsController::class, 'update'])->name('update');
    Route::delete('/{id}', [AppointmentsController::class, 'destroy'])->name('delete');
});


Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
    'name' => 'admin.'
    ], function(){
    Route::get('/welcome', [AdminController::class, 'welcome']);
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('/users', [AdminController::class, 'showUsers'])->name('showUsers');
    Route::get('/admins', [AdminController::class, 'showAdmins'])->name('showAdmins');
    Route::post('/create-newuser', [UserController::class, 'store']);
    Route::get('/create-user',[UserController::class, 'create'])->name('create');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update');
    Route::post('/create-newadmin', [AdminController::class, 'storeAdmin']);
    Route::get('/create-admin', [AdminController::class, 'createAdmin'])->name('createAdmin');
    Route::get('/edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::put('/update-admin/{id}', [AdminController::class, 'updateAdmin'])->name('updateAdmin');
    Route::get('/create-pet/{id}', [AdminController::class, 'createPet'])->name('createPet');
    Route::post('/create-newpet/{id}', [AdminController::class, 'storePet']);
    Route::get('/pets', [AdminController::class, 'showPets'])->name('showPets');
    Route::get('/appointments',[AdminController::class, 'showAppoitments'])->name('showAppoitments');
    Route::get('/createAppointments/{id}', [AdminController::class, 'createAppointments'])->name('createAppointments');
    Route::post('/create-Appointments/{id}', [AdminController::class, 'storeAppointments']);
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
/************************** Calendar **************************/ 
Route::get('/calendar', function () {
    return view('calendar');
});
// Route::view('/calendar', 'calendar');
/************************** JetStream **************************/
Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    ], function (){
        Route::get('/dashboard', [Controller::class, 'index'])->name('index');
});


