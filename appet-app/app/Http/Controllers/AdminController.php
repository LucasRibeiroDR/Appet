<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $this->authorize('admin-page');

        return view ('admin.welcome');
    }

    public function index()
    {
        $this->authorize('admin-page');

        return view ('admin.dashboard');
    }

    public function showUsers(){

        $this->authorize('admin-page');

        $search = request('search');

        if($search){
            $users = User::where([
                ['name', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $users = User::all()->sortBy('name');
        }

        return view ('admin.showusers',[
            'users' => $users,
            'search' => $search
        ]);

    }

    public function showAdmins(){

        $this->authorize('admin-page');

        $admins = User::all()->sortBy('name');

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

        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->rg = $request->rg;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->student="Não";
        $user->password = $request->password;
        //add hash e add o use hash

        $user->assignRole('admin');

        $user->save();



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
        $pet->data_nascimento = $request->data_nascimento;
        $pet->castrado = $request->castrado;

        $pet->user_id = $id;

        $pet->save();

        return redirect('/admin/dashboard')->with('msg', 'Pet criado com sucesso');
    }

    public function showPets() {

        $this->authorize('view-pets');

        $search = request('search');

        if($search){
            $pets = Pet::where([
                ['name', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $pets = Pet::all();
        }

        return view('admin.showpets', ['pets' => $pets, 'search' => $search]);

    }

    public function showAppoitments(){

        $this->authorize('view-appointments');

        $appointments = Appointment::all();


        return view ('admin.showappointments', ['appointments' => $appointments]);

    }

    public function createAppointments($id){

        $this->authorize('create-appointment');

        $user = User::findOrfail($id);

        return view ('admin.createAppointments', ['user' => $user]);
    }

    public function storeAppointments(Request $request, $id){
        $this->authorize('create-appointment');

        $appointments = new Appointment;

        $request->validate([
            'pet_id' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'area_consulta' => 'required',
            'descricao' => 'required',

        ]);

        $appointments->user_id = $id;
        $appointments->pet_id = $request->pet_id;
        $appointments->date = $request->date;
        $appointments->hour = $request->hour;
        $appointments->area_consulta = $request->area_consulta;
        $appointments->descricao = $request->descricao;

        $appointments->save();

        return redirect('admin/dashboard')->with('msg', 'Agendado com sucesso!!!');
    }



}
