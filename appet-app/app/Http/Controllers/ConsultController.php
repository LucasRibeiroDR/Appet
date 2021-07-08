<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consult;
class ConsultController extends Controller
{
    public function register(){
        return view('clinic.register');
    }
}
