<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\User;
use App\Models\Pelugem;

class PetsController extends Controller
{
    public function create()
    {
        $this->authorize('create-pet');

        $pelugens = DB::table('pelugens')
            ->select('name')
            ->orderBy('name', 'asc')
            ->get();

        return view('pets.create', ['pelugens' => $pelugens]);
    }

    public function store(Request $request)
    {
        $this->authorize('create-pet');

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
        $pet->status = true;

        $user = auth()->user();

        $pet->user_id = $user->id;

        $pet->save();

        return redirect('/pets/show')->with('msg', 'Pet criado com sucesso!');;
    }

    public function show()
    {
        $this->authorize('view-pet');

        $user = auth()->user();
        $pets = $user->pets;
        return view('pets.show', ["pets" => $pets]);
    }

    public function destroy($id)
    {
        $this->authorize('delete-pet');

        Pet::findOrFail($id)->delete();
        return redirect('/pets/show')->with('msg', 'Pet excluído com sucesso!');;
    }

    public function edit($id)
    {
        $this->authorize('edit-pet');

        $user = auth()->user();
        $pet = Pet::findOrFail($id);
        if($user->id != $pet->user_id && $user->hasRole('user')) {
            return redirect('/pets/show')->with('msg', 'Pet atualizado com sucesso!');
        }
        return view('pets.edit', ['pet' => $pet]);
    }

    public function update(Request $request)
    {
        $this->authorize('edit-pet');

        $data = $request->all();
        Pet::findOrFail($request->id)->update($data);
        return redirect('/pets/show')->with('msg', 'Pet atualizado com sucesso!');
    }
}
