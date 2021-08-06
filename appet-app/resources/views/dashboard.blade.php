@extends('layouts.main')

@section('title', 'APPet | Dashboard')
@section('content')

<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Dashboard</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        <div class="userDashboard">
            <div class="form-group ">
                <label class="labelDashboard" for="name">Usuário: </label>
                <input class="inputDashboard" type="text" id="name" wire:model.defer="state.name" autocomplete="name" readonly value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label class="labelDashboard" for="name">CPF: </label>
                <input class="inputDashboard" type="text" id="cpf" wire:model.defer="state.cpf" autocomplete="cpf" readonly value="{{Auth::user()->cpf}}">
            </div>
            <div class="form-group">
                <label class="labelDashboard" for="name">Email : </label>
                <input class="inputDashboard" type="text" id="email" wire:model.defer="state.email" autocomplete="email" readonly value="{{Auth::user()->email}}">
            </div>
        </div>
        <div>
            <p class="editProfile">Edite seu <a href="/user/profile">Perfil</a></p>
        </div>
    </div>
</div>

@endsection
