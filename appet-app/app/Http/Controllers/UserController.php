<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Consult;
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
        $users = new User;

        $users->name = $request->name;
        $users->cpf = $request->cpf;
        $users->rg = $request->rg;
        $users->telefone = $request->telefone;
        $users->endereco = $request->endereco;
        $users->email = $request->email;
        $users->password = $request->password;

        $user = auth()->user();
        $users->user_id = $user->id;

        $users->save();

        $request->validate([
            'name' => 'required',
            'cpf' => 'required',
            'rg' => 'required', 
            'telefone' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        return redirect('/')
            ->with('msg', 'Um novo usuário foi criado com sucesso!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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
        $user = auth()->user();
        $users = User::findOrFail($id);
        if($user->id != $users->user_id) {
            return redirect('/users/show');
        }
        return view('users.edit', ['users' => $users]);
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
        $data = $request->all();
        User::findOrFail($request->id)->update($data);
        return redirect('/users/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/users/show')
            ->with('msg', 'Usuário excluído com sucesso!');
    }
}
