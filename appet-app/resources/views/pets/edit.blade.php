@extends('layouts.main')

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

<x-guest-layout>
    <link rel="stylesheet" href="/css/user/forms.css">
    <x-jet-validation-errors class="mb-4" />

    <div id="event-create-container" class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="width: 440px !important;">
                <form action="/pets/update/{{ $pet->id }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Editar
                    </span>
                    @method('PUT')
                    <div class="wrap-input100 validate-input">
                        <label for="name" class="label100">Nome do animal</label>
                        <input type="text" class="input100" id="name" name="name" placeholder="Bob, Nina, Belinha, ..." value="{{ $pet->name }}" maxlength=50>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <label for="raca" class="label100">Raça</label>
                        <input type="text" class="input100" id="raca" name="raca" placeholder="Pinscher, poodle, pug, chihuahua, ..." value="{{ $pet->raca }}">
                    </div>
                    <div class="wrap-input100 validate-input">
                        <label for="pelugem" class="label100">Cor da pelagem</label>
                        <input type="text" class="input100" id="pelugem" name="pelugem" placeholder="Marrom claro, marrom escuro, preto, ..." value="{{ $pet->pelugem }}">
                    </div>
                    <div class="wrap-input100 validate-input">
                        <label for="especie" class="label100">Especie</label>
                        <select name="especie" id="especie" class="input100" onchange="hidden_show()">
                            <option value="Gato">Gato</option>
                            <option value="Cachorro">Cachorro</option>
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input" id="porte_value">
                        <label for="porte" class="label100">Porte do animal</label>
                        <select name="porte" id="porte" class="input100">
                            <option>Mini</option>
                            <option>Pequeno</option>
                            <option>Medio</option>
                            <option>Grande</option>
                            <option>Gigante</option>
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <label for="data_nascimento" class="label100">Data de Nascimento</label>
                        <input type="date" class="input100" name="data_nascimento" id="data_nascimento" value="{{ $pet->data_nascimento->format('Y-m-d') }}">
                    </div>
                    <div class="wrap-input100 validate-input">
                        <label for="castrado" class="label100">O animal é castrado?</label>
                        <select name="castrado" id="castrado" class="input100">
                            <option value="0">Não</option>
                            <option value="1" {{ $pet->castrado == 1 ? "selected='selected'" : "" }}>Sim</option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
            <label for="statys">Status do Animal</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Vivo</option>
                <option value="0" {{ $pet->status == 0 ? "selected='selected'" : "" }}>Morto</option>
            </select>
        </div> -->

                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Finalizar Edição">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
<script type="text/javascript" src="../../../public/js/index.js"></script>
@endsection