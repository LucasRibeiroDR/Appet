@extends('layouts.main')

@section('title', 'APPet | Novo Pet')
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre seu Pet</h1>
    <form action="/pets" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nome do Pet</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Bob, Nina, Belinha, ...">
        </div>
        <div class="form-group">
            <label for="raca">Raça do Pet</label>
            <input type="text" class="form-control" id="raca" name="raca" placeholder="Pinscher, poodle, pug, chihuahua, ...">
        </div>
        <div class="form-group">
            <label for="pelugem">Cor da pelagem</label>
            <input type="text" class="form-control" id="pelugem" name="pelugem" placeholder="Marrom claro, marrom escuro, preto, ...">
        </div>
        <div class="form-group">
            <label for="especie">Especie do seu Pet</label>
            <select name="especie" id="especie" class="form-control">
              <option>Gato</option>
              <option >Cachorro</option>
            </select>
        </div>


        <div class="form-group">
                <label for="porte">Porte do dog</label>
                <select name="porte" id="porte" class="form-control">
                    <option>Mini</option>
                    <option>Pequeno</option>
                    <option>Medio</option>
                    <option>Grande</option>
                    <option>Gigante</option>
                    
                </select>
            </div>

      {{-- @if($pet->especie->value==1)
            <div class="form-group">
                <label for="porte">Porte do dog</label>
                <select name="porte" id="porte" class="form-control">
                    <option>Mini</option>
                    <option>Pequeno</option>
                    <option>Medio</option>
                    <option>Grande</option>
                    <option>Gigante</option>
                    
                </select>
            </div>
            @else
            <div class="form-group" style="display:hidden;">
                <label for="porte">Porte do dog</label>
                <select name="porte" id="porte" class="form-control">
                    <option>Mini</option>
                    <option>Pequeno</option>
                    <option>Medio</option>
                    <option>Grande</option>
                    <option>Gigante</option>
                    
                </select>
            </div>
            @endif --}}

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
