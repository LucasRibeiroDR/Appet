<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clinic/register',[ConsultController::class, 'register']);

