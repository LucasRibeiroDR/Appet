@extends('layouts.main')

@section('title', 'APPet | Criar Usuário')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Usuário</h1>
    <form action="/admin/update-user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do novo usuário...." value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="{{ $user->cpf }}">
        </div>
        <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="00.000.000-0" value="{{ $user->rg }}">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="{{ $user->telefone }}">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua, avenida, ..." value="{{ $user->endereco }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="exempla@gmail.com ....." value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Senha ...." value="{{ $user->password }}">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Editar Usuário">
        </div>   
    </form>
</div>
@endsection