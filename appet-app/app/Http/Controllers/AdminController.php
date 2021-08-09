<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin-page');
        
        return view ('admin.dashboard');
    }

    public function showUsers(){

        $this->authorize('admin-page');

        $users = User::all();

        //dd($users);

        return view ('admin.showusers',[
            'users' => $users,
        ]);

    }

    public function showAdmins(){

        $this->authorize('admin-page');

        $admins = User::all();

        //dd($users);

        return view ('admin.showadmins',[
            'admins' => $admins,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
        $this->authorize('create-admin');

        return view ('admin.create-adm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(Request $request)
    {
        $this->authorize('create-admin');

        $user = new User;

        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->rg = $request->rg;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->assignRole('admin');
        
        $user->save();

        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'rg' => 'required', 
            'telefone' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        return redirect('/admin/dashboard')->with('msg', 'Um novo adm foi criado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAdmin($id)
    {
        //
    }

    public function createPet($id){

        $this->authorize('create-pet');

        $user = User::findOrFail($id);

        return view('admin/create-pet', ['user' => $user]);
    }

    public function storePet(Request $request, $id){

        $pet = new Pet;

        $pet->name = $request->name;
        $pet->raca = $request->raca;
        $pet->pelugem = $request->pelugem;
        $pet->especie = $request->especie;
        $pet->data_nascimento = $request->data_nascimento;
        $pet->castrado = $request->castrado;

        $pet->user_id = $id;

        $pet->save();

        return redirect('/admin/dashboard')->with('msg', 'Pet criado com sucesso');
    }

    public function showPets() {

        $pets = Pet::all();
        
        return view('admin/showpets', ['pets' => $pets]);

    }

}
