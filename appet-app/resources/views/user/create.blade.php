@extends('layouts.main')

@section('title', 'APPet | Criar Usuário')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Criar Usuário</h1>
    <form action="/pets" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do novo usuário....">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
        </div>
        <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="00.000.000-0">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Rua, avenida, ...">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="exempla@gmail.com .....">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Senha ....">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Adicionar Usuário">
        </div>   
    </form>
</div>
@endsection