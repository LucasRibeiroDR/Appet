@extends('layouts.main')

@section('title', 'PetsOn')
@section('content')

{{--@dump($errors->all())--}}
@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error) 
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<div>
  <div class="col-md-6 offset-md-1 " style="margin-top: 100px;">
    <h1>Agende a consulta do seu animalzinho pelo site do HV UENP!</h1>
    <ul class="lista mt-3">
      <li>Agende consulta sem sair de casa</li>
      <li>Salve os dados do seu animal no nosso sistema</li>
      <li>Receba notificações no dia da consulta</li>
    </ul>
    <form method="get" action="{{ route('user.calendar') }}">
      <button type="submit" class="w-100 btn btn-outline-primary mt-3" title="Clique para agendar sua consulta">Agendar consulta</button>
    </form>
  </div>
  <div class="col-md-6 offset-md-1 dashboard-pets-container">
    <img class="imagemHome" src="./img/tel.png" alt="">
  </div>
</div>
@endsection