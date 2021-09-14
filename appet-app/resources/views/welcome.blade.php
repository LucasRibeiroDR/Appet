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

<link rel="stylesheet" href="/css/home.css">

<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-xl-7">
        <div>
          <h1 class="h1-large">Agende a consulta do seu animalzinho pelo site do HV UENP!</h1>
          <ul>
            <li>Agende consulta sem sair de casa</li>
            <li>Salve os dados do seu animal no nosso sistema</li>
            <li>Receba notificações no dia da consulta</li>
          </ul>
          <a class="btn-solid-lg" href="/appointments/show">Agendar consulta</a>
        </div>
      </div>
      <div class="col-lg-6 col-xl-5">
        <div class="image-container">
          <img class="img-fluid" src="./img/tel.png" alt="">
        </div>
      </div>
    </div>
  </div>
</header>


  @endsection