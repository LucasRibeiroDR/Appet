<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="/img/pet.ico" type="image/x-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Scripts -->
  <script src="/js/index.js"></script>
  <script src="/js/main.js"></script>
  <script src="{{ mix('js/app.js') }}" defer></script>
  <!-- Styles -->
  <style>
    body {
      background-color: #f2f2f2;
      font-family: 'Nunito', sans-serif;
      
    }
  </style>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  @livewireStyles
  <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('css/cssAdmin/dashboard.css') }}">
</head>

<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a href="/admin/welcome" class="navbar-brand hvUenpLogo">
          <img src="{{ asset('img/hv-uenp.png') }}" alt="Logo HV">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <ion-icon class="navbar-toggler-icon" name="menu"></ion-icon>
        </button>
        <div class="navbar-collapse" id="navbarSupportedContent" style="justify-content: center; text-align: center;">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="/admin/welcome" class="nav-link">PetsOn</a>
            </li>
            <li class="nav-item">
              <a href="/admin/appointments" class="nav-link">Consultas</a>
            </li>
            @auth
            <li class="nav-item">
              <a href="/admin/pets" class="nav-link">Pets</a>
            </li>
            <li class="nav-item">
              <a href="/admin/users" class="nav-link">Usuários</a>
            </li>
            <li class="nav-item">
              <a href="/admin/admins" class="nav-link">Administradores</a>
            </li>
            <li class="nav-item">
              <a href="/admin/dashboard" class="nav-link">Perfil</a>
            </li>
            <li class="nav-item">
              <form action="/logout" method="POST">
                @csrf
                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                      this.closest('form').submit();">
                  Sair
                </a>
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
  </header>
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
  <footer>
    <p>PetsOn &copy; 2021</p>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="{{asset('site/bootstrap.js')}}"></script>
</body>

</html>