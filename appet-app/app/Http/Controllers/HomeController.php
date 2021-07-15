<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consult;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }
}
