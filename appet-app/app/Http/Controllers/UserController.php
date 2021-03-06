<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.show', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin-create-user');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin-create-user');

        $user = new User;

        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'student' => 'required',
            'password' => 'required',
        ]);

        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->rg = $request->rg;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->student = $request->student;
        $user->ra = $request->ra;
        $user->password = Hash::make($request->password);

        $user->assignRole('user');

        $user->save();

        return redirect('/admin/users')->with('msg', 'Um novo usuário foi criado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $this->authorize('admin-view-user');
        $user = auth()->user();
        $users = $user->users;
        return view('users.show', [
            "users" => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin-edit-user');
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('admin-edit-user');
        $data = $request->all();
        User::findOrFail($id)->update($data);
        return redirect('/admin/users')->with('msg', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin-delete-user');
        User::findOrFail($id)->delete();
        return redirect('/admin/users')->with('msg', 'Usuário excluído com sucesso!');
    }

    public function dashboard()
    {
        $this->authorize('admin-dashboard');
        return view('users.dashboard');
    }
}
