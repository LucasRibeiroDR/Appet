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

<body class="header">
  <div class="container">
    <div class="row d-flex ">
      <div class="col-lg-6 col-xl-6">
        <div>
          <h1 class="h1-large">Agende a consulta do seu animalzinho pelo site do HV UENP!</h1>
          <ul>
            <li>Agende consulta sem sair de casa</li>
            <li>Salve os dados do seu animal no nosso sistema</li>
            <li>Receba notificações no dia da consulta</li>
          </ul>
          <button class="w-100 btn btn-outline-primary mt-3">Agendar consulta</button>
        </div>
      </div>
      <div class="col-lg-6 col-xl-6">
        <div class="image-container">
          <img class="img-fluid" src="./img/tel.png" alt="">
        </div>
      </div>
    </div>
  </div>
</body>

@endsection