@extends('layouts.main')
@section('title', 'PetsOn | Novo Pet')
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

<div id="event-create-container" class="col-md-6 offset-md-3" style="margin-bottom: 120px;">
    <h1>Cadastre seu Pet</h1>
    <form action="/pets" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Pet</label>
            <input required type="text" class="form-control" id="name" name="name" placeholder="Bob, Nina, Belinha, ..." maxlength=50>
        </div>
        <div class="form-group">
            <label for="raca">Raça do Pet</label>
            <input required type="text" class="form-control" id="raca" name="raca" placeholder="Pinscher, poodle, pug, chihuahua, ...">
        </div>
        <div class="form-group">
            <label for="pelugem">Cor da pelagem</label>
            <select required name="pelugem" id="pelugem" class="form-control">
                @foreach ($pelugens as $pelugem)
                <option value="{{ $pelugem->name }}">{{ $pelugem->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="especie">Especie do seu Pet</label>
            <select name="especie" id="especie" class="form-control" onchange="hidden_show()">
                <option value="Gato">Gato</option>
                <option value="Cachorro">Cachorro</option>
            </select>
        </div>

        <div class="form-group porte" id="porte_value">
            <label for="porte">Porte do dog</label>
            <select name="porte" id="porte" class="form-control">
                <option>Mini</option>
                <option>Pequeno</option>
                <option>Médio</option>
                <option>Grande</option>
                <option>Gigante</option>
            </select>
        </div>


        <div class="form-group">
            <label for="data_nascimento">Data de nascimento</label>
            <input required type="date" class="form-control" name="data_nascimento" id="data_nascimento">
        </div>
        <div class="form-group">
            <label for="castrado">O animal é castrado?</label>
            <select name="castrado" id="castrado" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary-" value="Adicionar Animal">
        </div>
</div>
</div>
@endsection