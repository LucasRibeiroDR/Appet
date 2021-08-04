<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consult;
use App\Models\User;
use App\Models\Pet;

class PetsController extends Controller
{
    public function create() {
        return view('pets.create');
    }

    public function store(Request $request){

        //dd($request);

        $pet = new Pet;

        $pet->name = $request->name;
        $pet->raca = $request->raca;
        $pet->pelugem = $request->pelugem;
        $pet->especie = $request->especie;
        $pet->data_nascimento = $request->data_nascimento;
        $pet->castrado = $request->castrado;

        $user = auth()->user();

        $pet->user_id = $user->id;

        $pet->save();

        

        return redirect('/');
    }
    
    public function show() {

        $user = auth()->user();

        $pets = $user->pets;

        return view('pets.show', ["pets" => $pets]);
    }

    public function destroy($id) {
        Pet::findOrFail($id)->delete();
        return redirect('/pets/show');
    }

    public function edit($id) {
        
        $user = auth()->user();

        $pet = Pet::findOrFail($id);

        if($user->id != $pet->user_id) {
            return redirect('/pets/show');
        }

        return view('pets.edit', ['pet' => $pet]);
    }
    
    public function update(Request $request) {
        $data = $request->all();

        Pet::findOrFail($request->id)->update($data);

        return redirect('/pets/show');
    }
}