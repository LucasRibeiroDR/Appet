@extends('layouts.app')

<!-- Header -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <!-- <div class="navbar-collapse justify-content-around" id="navbar"> -->
    <a href="/" class="navbar-brand hvUenpLogo">
      <img src="{{ asset('img/hv-uenp.png') }}" alt="Logo HV">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="/" class="nav-link active">Home</a>
        </li>
        <li class="nav-item">
          <a href="/appointments/show" class="nav-link">Agendamentos</a>
        </li>
        @auth
        <li class="nav-item">
          <a href="/pets/show" class="nav-link">Meus pets</a>
        </li>
        @can('user-page')        
        <li class="nav-item">
          <a href="/dashboard" class="nav-link">Perfil</a>
        </li>
        @elsecan('admin-page')
        <li class="nav-item">
          <a href="/admin/dashboard" class="nav-link">Perfil</a>
        </li>
        @endcan
        <li class="nav-item">
          <form class="d-flex" action="/logout" method="POST">
            @csrf
            <a href="/logout" class="nav-link" onclick="event.preventDefault();
                      this.closest('form').submit();">Sair</a>
          </form>
        </li>
        @endauth
        @guest
        <li class="nav-item">
          <a href="/login" class="nav-link">Entrar</a>
        </li>
        <li class="nav-item">
          <a href="/register" class="nav-link">Cadastrar</a>
        </li>
        @endguest
      </ul>
      <span class="nav-brand">
        <img class="uenpLogo" src="{{ asset('img/uenp.png') }}" alt="Logo UENP">
      </span>
    </div>
  </div>
</nav>
<!-- Main -->
<main>
  <div class="container-fluid">
    <div class="row">
      @if(session('msg'))
      <p class="msg">{{ session('msg') }}</p>
      @endif
      @yield('content')
    </div>
  </div>
</main>
<!-- Footer -->
<footer class="fixed-bottom">
  <p>APPet &copy; 2021</p>
</footer>