<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Calendar;
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
        $this->authorize('admin-welcome');
        return view ('admin.welcome');
    }

    public function index()
    {
        $this->authorize('admin-dashboard');
        return view ('admin.dashboard');
    }

    public function showUsers()
    {
        $this->authorize('admin-view-user');

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
        $this->authorize('admin-create-admin');
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
        $this->authorize('admin-create-admin');

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

        return redirect('/admin/dashboard')->with('msg', 'Novo ADM criado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('admin-view-admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        $this->authorize('admin-edit-admin');
        $admin = User::findOrFail($id);
        return view('admin.edit-adm', ['admin' => $admin]);
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
        $this->authorize('admin-edit-admin');
        $data = $request->all();
        User::findOrFail($request->id)->update($data);
        return redirect('/admin/admins')->with('msg', 'Admin atualizado com sucesso!!!');;
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

    public function createPet($id)
    {
        $this->authorize('admin-create-pet');

        $user = User::findOrFail($id);

        $pelugens = DB::table('pelugens')
            ->select('name')
            ->get();

        return view('admin/create-pet', ['user' => $user, 'pelugens' => $pelugens]);
    }

    public function storePet(Request $request, $id)
    {
        $this->authorize('admin-create-pet');

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

        return redirect('/admin/dashboard')->with('msg', 'Pet criado com sucesso!!!');
    }

    public function showPets() 
    {
        $this->authorize('admin-view-pet');

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

    public function editPet($id) 
    {
        $this->authorize('admin-edit-pet');
        $user = auth()->user();
        $pet = Pet::findOrFail($id);
        if($user->id != $pet->user_id) {
            return redirect('/admin/pets');
        }
        return view('pets.edit', ['pet' => $pet])->with('msg', 'Pet atualizado com sucesso!');
    }

    public function updatePet(Request $request) 
    {
        $this->authorize('admin-edit-pet');
        $data = $request->all();
        Pet::findOrFail($request->id)->update($data);
        return redirect('/admin/pets')->with('msg', 'Pet atualizado com sucesso!');
    }

    public function destroyPet($id) 
    {
        $this->authorize('admin-delete-pet');
        Pet::findOrFail($id)->delete();
        return redirect('/admin/pets')->with('msg', 'Pet excluído com sucesso!');
    }

    public function showAppoitments()
    {
        $this->authorize('admin-view-appointment');
        $appointments = Appointment::all();
        return view ('admin.showappointments', ['appointments' => $appointments]);
    }

    public function createAppointments($id)
    {
        $this->authorize('admin-create-appointment');
        $user = User::findOrFail($id);
        return view ('admin.createAppointments', ['user' => $user]);
    }

    public function storeAppointments(Request $request, $id)
    {
        $this->authorize('admin-create-appointment');

        $appointments = new Appointment;

        $request->validate([
            'pet_id' => 'required',
            'timeslot' => 'required|max:17',
            'area_consulta' => 'required',
            'descricao' => 'required',
        ]);

        $appointments->user_id = $id;
        $appointments->pet_id = $request->pet_id;
        $appointments->date = $request->date;
        $appointments->timeslot = $request->timeslot;
        $appointments->area_consulta = $request->area_consulta;
        $appointments->descricao = $request->descricao;

        $appointments->save();

        return redirect('/admin/appointments')->with('msg', 'Agendado com sucesso!!!');
    }
    
    public function adminCalendar($id) 
    { 
        $this->authorize('admin-calendar');
        $user = User::findOrFail($id);
        return view('admin.calendar', [
            'user' => $user,
        ]);
    }
}
