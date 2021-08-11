@extends('layouts.admin')

@section('title', 'APPet | Novo Pet')
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie Pet do {{ $user->name }}</h1>
    <form action="/admin/create-newpet/{{ $user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Bob, Nina, Belinha, ...">
        </div>
        <div class="form-group">
            <label for="raca">Raça</label>
            <input type="text" class="form-control" id="raca" name="raca" placeholder="Pinscher, poodle, pug, chihuahua, ...">
        </div>
        <div class="form-group">
            <label for="pelugem">Cor da pelagem</label>
            <input type="text" class="form-control" id="pelugem" name="pelugem" placeholder="Marrom claro, marrom escuro, preto, ...">
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <input type="text" class="form-control" id="especie" name="especie" placeholder="Caninos, felinos, ...">
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
        </div>
        <div class="form-group">
            <label for="castrado">O animal é castrado?</label>
            <select name="castrado" id="castrado" class="form-control">
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Adicionar Animal">
        </div>   
    </form>
</div>
@endsection