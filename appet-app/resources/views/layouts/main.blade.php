<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="./img/pet.ico" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="/css/globalColors.css">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <!-- Scripts -->
        <script src="/js/main.js"></script>
        <script src="/js/idade.js"></script>
    </head>
    <body>
      <!-- Header -->
      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="collapse navbar-collapse" id="navbar">
           <a href="/" class="navbar-brand">
            <img src="/img/pet.ico" alt="APPet Icon">
           </a>
           <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/" class="nav-link">APPet</a>
            </li>
            <li class="nav-item">
              <a href="/appointments/show" class="nav-link">Agendamentos</a>
            </li>
            <li>
            <a href="/pets/create" class="nav-link">Cadastrar pet</a>
            </li>
            @auth
              <li class="nav-item">
              <a href="/pets/show" class="nav-link">Meus pets</a>
              </li>

              @can('user-page')
              <li class="nav-item">
                <a href="/dashboard" class="nav-link">Dashboard</a>
              </li>
              @elsecan('admin-page')
              <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link">Dashboard</a>
              </li>
              @endcan
              
              <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a
                    href="/logout"
                    class="nav-link"
                    onclick="event.preventDefault();
                      this.closest('form').submit();"
                  >
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
        <p>APPet &copy; 2021</p>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>