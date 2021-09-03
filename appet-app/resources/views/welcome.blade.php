@extends('layouts.main')

@section('title', 'PetsOn')
@section('content')

<div>
  <div class="col-md-6 offset-md-1 " style="margin-top: 100px;">
    <h1>Agende a consulta do seu animalzinho pelo site do HV UENP!</h1>
    <ul class="lista mt-3">
      <li>Agende consulta sem sair de casa</li>
      <li>Salve os dados do seu animal no nosso sistema</li>
      <li>Receba notificações no dia da consulta</li>
    </ul>

    {{-- <form method="get" action="/appointments/show"> --}}
    <form method="get" action="/calendar">
      <button type="submit" class="w-100 btn btn-outline-primary mt-3">Agendar consulta</button>
    </form>
  </div>
  <div class="col-md-6 offset-md-1 dashboard-pets-container">
    <img class="imagemHome" src="./img/tel.png" alt="">
  </div>
  <!-- <a href="/user/create">User create</a> -->
</div>
@endsection