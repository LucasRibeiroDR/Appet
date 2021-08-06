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
        $user = User::all();
        return view('user.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->rg = $request->rg;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->password = $request->password;

        $admin = auth()->user();
        $user->admin_id = $admin->id;

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
        $admin = auth()->user();
        $user = $admin->user;
        return view('user.show', [
            "user" => $user
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
        $admin = auth()->user();
        $user = User::findOrFail($id);
        if($admin->id != $user->admin_id) {
            return redirect('/user/show');
        }
        return view('user.edit', ['user' => $user]);
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
        return redirect('/user/show');
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
        return redirect('/user/show')
            ->with('msg', 'Usuário excluído com sucesso!');
    }
}
