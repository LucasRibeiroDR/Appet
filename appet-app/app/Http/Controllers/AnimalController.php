<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consult;

class AnimalController extends Controller
{
    public function create(){
        return view ('animals.create');
    }
}
