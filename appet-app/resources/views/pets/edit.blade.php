@extends('layouts.main')

@section('title', 'APPet | Editando Pet')
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando seu Pet</h1>
    <form action="/pets/update/{{ $pet->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome do Pet</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Bob, Nina, Belinha, ..." value="{{ $pet->name }}">
        </div>
        <div class="form-group">
            <label for="raca">Raça do Pet</label>
            <input type="text" class="form-control" id="raca" name="raca" placeholder="Pinscher, poodle, pug, chihuahua, ..." value="{{ $pet->raca }}">
        </div>
        <div class="form-group">
            <label for="pelugem">Cor da pelagem</label>
            <input type="text" class="form-control" id="pelugem" name="pelugem" placeholder="Marrom claro, marrom escuro, preto, ..." value="{{ $pet->pelugem }}">
        </div>
        <div class="form-group">
            <label for="especie">Especie do seu Pet</label>
            <input type="text" class="form-control" id="especie" name="especie" placeholder="Cachorro, gato, ..." value="{{ $pet->especie }}">
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="{{ $pet->data_nascimento->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="castrado">O animal é castrado?</label>
            <select name="castrado" id="castrado" class="form-control">
                <option value="0">Não</option>
                <option value="1"{{ $pet->castrado == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Editar meu Pet">
        </div>       
    </form>
</div>
@endsection