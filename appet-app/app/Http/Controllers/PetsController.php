<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consult;
use App\Models\User;

class PetsController extends Controller
{
    public function create() {
        return view('pets.create');
    }
    
    public function show($id) {

    }

    public function destroy($id) {

    }

    public function edit($id) {
        
    }
    
    public function update(Request $request) {

    }

}
