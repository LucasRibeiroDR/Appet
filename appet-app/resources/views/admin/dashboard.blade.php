@extends('layouts.admin')

@section('title', 'PetsOn | Perfil')
@section('content')

<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Perfil | Admin</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        <div class="userDashboard">
            <div class="form-group ">
                <label class="labelDashboard" for="name">Usuário: </label>
                <input class="inputDashboard" type="text" id="name" wire:model.defer="state.name" autocomplete="name" readonly value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label class="labelDashboard" for="name">Email Usuário: </label>
                <input class="inputDashboard" type="text" id="name" wire:model.defer="state.name" autocomplete="name" readonly value="{{Auth::user()->email}}">
            </div>
        </div>
        <div>
            <p class="editProfile">Edite seu <a href="/user/profile">Perfil</a></p>
        </div>
    </div>
</div>

@endsection
