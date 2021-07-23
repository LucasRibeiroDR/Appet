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

        

        $pet = new Pet;

        $pet->name = $request->name;
        $pet->raca = $request->raca;
        $pet->pelugem = $request->pelugem;
        $pet->especie = $request->especie;
        $pet->descricao = $request->descricao;
        $pet->area_atendimento = $request->area_atendimento;
        $pet->data_nascimento = $request->data_nascimento;
        $pet->castrado = $request->castrado;
        $pet->save();

        

        return redirect('/');

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
