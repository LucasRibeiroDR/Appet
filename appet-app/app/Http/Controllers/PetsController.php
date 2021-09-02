<?php

namespace App\Http\Controllers;

use App\Models\Pelugem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Consult;
use App\Models\User;
use App\Models\Pet;

class PetsController extends Controller
{
    public function create() {

        $this->authorize('create-pet');

        $pelugens = DB::table('pelugens')
            ->select('name')
            ->get();


        return view('pets.create', ['pelugens' => $pelugens]);
    }

    public function store(Request $request){

        $this->authorize('create-pet');

        //dd($request);
        $pet = new Pet;

        $request->validate([
           'name' => 'required',
           'raca' => 'required',
           'pelugem' => 'required',
           'especie' => 'required',
           'data_nascimento' => 'required',
           'castrado' => 'required',
        ]);

        $pet->name = $request->name;
        $pet->raca = $request->raca;
        $pet->pelugem = $request->pelugem;
        $pet->especie = $request->especie;
        $pet->porte= $request->porte;
        $pet->data_nascimento = $request->data_nascimento;
        $pet->castrado = $request->castrado;

        $user = auth()->user();

        $pet->user_id = $user->id;

        $pet->save();

        return redirect('/pets/show');
    }

    public function show() {

        $this->authorize('view-pets');

        $user = auth()->user();
        $pets = $user->pets;
        return view('pets.show', ["pets" => $pets]);
    }

    public function destroy($id) {
        $this->authorize('delete-pet');

        Pet::findOrFail($id)->delete();
        return redirect('/pets/show');
    }

    public function edit($id) {

        $this->authorize('edit-pet');

        $user = auth()->user();
        $pet = Pet::findOrFail($id);
        if($user->id != $pet->user_id && $user->hasRole('user')) {
            return redirect('/pets/show');
        }
        return view('pets.edit', ['pet' => $pet]);
    }

    public function update(Request $request) {

        $this->authorize('edit-pet');

        $data = $request->all();
        Pet::findOrFail($request->id)->update($data);
        return redirect('/pets/show');
    }

    // public function destroy($id) {
    //     Pet::findOrFail($id)->delete();
    //     return redirect('/pets/show')->with('msg', 'Pet excluído com sucesso!');
    // }

    //     public function calcularDataNascimento($data) {
    //     $idade = 0;
    //     $data_nascimento = date('Y-m-d', strtotime($data));
    //     $data = explode("-",$data_nascimento);
    //     $anoNasc  = $data[0];
    //     $mesNasc  = $data[1];
    //     $diaNasc  = $data[2];

    //     $anoAtual = date("Y");
    //     $mesAtual = date("m");
    //     $diaAtual = date("d");

    //     $idade = $anoAtual - $anoNasc;
    //     if ($mesAtual < $mesNasc){
    //         $idade -= 1;
    //     } elseif (($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc)){
    //         $idade -= 1;
    //     }
    //     return ($idade);
    // }-
}
