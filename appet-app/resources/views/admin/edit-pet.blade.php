@extends('layouts.admin')

@section('title', 'PetsOn | Editando Pet')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando Pet</h1>
    <form action="/admin/update-pet/{{ $pet->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Bob, Nina, Belinha, ..." value="{{ $pet->name }}" maxlength=50>
        </div>
        <div class="form-group">
            <label for="especie">Especie</label>
            <select name="especie" id="especie" class="form-control" onchange="hidden_show()">
                <option value="0">Gato</option>
                <option value="1">Cachorro</option>
            </select>
        </div>

        <div class="form-group porte" id="porte_value">
            <label for="porte">Porte</label>
            <select name="porte" id="porte" class="form-control">
                <option>Mini</option>
                <option>Pequeno</option>
                <option>Medio</option>
                <option>Grande</option>
                <option>Gigante</option>
            </select>
        </div>

        <div class="form-group">
            <label for="raca">Raça</label>
            <input type="text" class="form-control" id="raca" name="raca" placeholder="Pinscher, poodle, pug, chihuahua, ..." value="{{ $pet->raca }}">
        </div>
        <div class="form-group">
            <label for="pelugem">Cor da Pelagem</label>
            <input type="text" class="form-control" id="pelugem" name="pelugem" placeholder="Marrom claro, marrom escuro, preto, ..." value="{{ $pet->pelugem }}">
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{ $pet->data_nascimento->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="castrado">Castrado?</label>
            <select name="castrado" id="castrado" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $pet->castrado == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>

        <div class="form-group">
            <label for="statys">Status do Animal</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Vivo</option>
                <option value="0" {{ $pet->status == 0 ? "selected='selected'" : "" }}>Morto</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary-" value="Finalizar Edição">
        </div>
    </form>
</div>
@endsection