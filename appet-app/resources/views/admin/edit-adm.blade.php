@extends('layouts.admin')

@section('title', 'PetsOn | Editar Adm {{ $admin->name }}')
@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Criar Adm</h1>
        <form action="/admin/update-admin/{{ $admin->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do novo usuário...." value="{{ $admin->name }}">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="{{ $admin->cpf }}">
            </div>
            <div class="form-group">
                <label for="rg">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" placeholder="00.000.000-0" value="{{ $admin->rg }}">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="{{ $admin->telefone }}">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua, avenida, ..." value="{{ $admin->endereco }}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Editar Adm">
            </div>
        </form>
    </div>
@endsection
