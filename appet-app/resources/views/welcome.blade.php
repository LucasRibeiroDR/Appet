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

<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-xl-7">
        <div class="text-container">
          <h1 class="h1-large">Agende a consulta do seu animalzinho pelo site do HV UENP!</h1>
            <p class="p-large">Agende consulta sem sair de casa</p>
            <p class="p-large">Salve os dados do seu animal no nosso sistema</p>
            <p class="p-large">Receba notificações no dia da consulta</p><br>
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
</div>

<!-- Como funciona -->
<div id="services" class="cards-1 bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Como funciona</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">

        <!-- Card -->
        <div class="card">
          <div class="card-icon green">
            <i class="fas fa-briefcase-medical"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title">Seu pet precisa de um veterinário ?</h5>
            <p>Seu animalzinho apresentou algum sintoma ou está na hora dos exames de rotina.</p>
          </div>
        </div>
        <!-- end of card -->

        <!-- Card -->
        <div class="card">
          <div class="card-icon green">
            <i class="fas fa-calendar-plus"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title">Agende sua consulta !</h5>
            <p>Cadastre-se no nosso site e marque sua consulta de onde quiser de acordo com a sua disponibilidade e do veterinário.</p>
          </div>
        </div>
        <!-- end of card -->

        <!-- Card -->
        <div class="card">
          <div class="card-icon green">
            <i class="fas fa-user-md"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title">A consulta ...</h5>
            <p>O veterinário verificará o quadro do paciente e ao finalizar a consulta e determinar o tratamento, será passado os cuidados a serem tomados e as medicações ou exames para o tratamento.</p>
          </div>
        </div>
        <!-- end of card -->

      </div>
    </div>
  </div>
</div>
<!-- Fim do como funciona-->

@endsection