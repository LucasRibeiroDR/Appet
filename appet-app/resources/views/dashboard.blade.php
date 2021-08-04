@extends('layouts.main')

@section('title', 'APPet | Dashboard')
@section('content')

<div>
    <h1>Dashboard</h1>
    <label for="name">Usuário</label>
    <input type="text" id="name" wire:model.defer="state.name" autocomplete="name" readonly value="{{Auth::user()->name}}">
    <label for="name">Email Usuário</label>
    <input type="text" id="name" wire:model.defer="state.name" autocomplete="name" readonly value="{{Auth::user()->email}}">
    <div>
        <a href="/user/profile">Profile</a>
    </div>
</div>

@endsection
