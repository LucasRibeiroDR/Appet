@extends('layouts.main')

@section('title', 'APPet | Novo Pet')
@section('content')

<link rel="stylesheet" href="/css/styles.css">


<div class="justify">

    <div class="containerCadPet">

        <div class="cadastro-content">
            <form action="/pets" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="titleText">Cadastro Pet</h2>
                <div class="form-group blc">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Bob, Nina, Belinha, ..." style="border-color: #1D4B80;" />
                </div>
                <div class="form-group blc">
                    <label for="raca">Raça:</label>
                    <input type="text" class="form-control" id="raca" name="raca" placeholder="Pinscher, poodle, pug, chihuahua, ..." style="border-color: #1D4B80;" />
                </div>
                <div class="form-group blc">
                    <label for="pelugem">Cor da pelagem:</label>
                    <input type="text" class="form-control" id="pelugem" name="pelugem" placeholder="Marrom claro, marrom escuro, preto, ..." style="border-color: #1D4B80;" />
                </div>
                <div class="form-group blc">
                    <label for="especie">Especie:</label>
                    <input type="text" class="form-control" id="especie" name="especie" placeholder="Cachorro, gato, ..." style="border-color: #1D4B80;" />
                </div>
                <div class="form-group blc">
                    <label for="data_nascimento">Data de nascimento</label>
                    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" style="border-color: #1D4B80; color:#1D4B80" />
                </div>
                <div class="form-group blc">
                    <label for="castrado">O animal é castrado?</label>
                    <select name="castrado" id="castrado" class="form-control" style="border-color: #1D4B80; color:#1D4B80">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="btnPet">
                    <input type="submit" class="btn btn-primary" value="Adicionar Animal">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection