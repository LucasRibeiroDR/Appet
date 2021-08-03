<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consult;
use App\Models\User;

class UserController extends Controller
{
    public function create() {

        return view('user.create');
    }
}
