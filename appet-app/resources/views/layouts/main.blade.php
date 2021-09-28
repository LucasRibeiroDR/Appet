<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>@yield('title')</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Scripts -->
  <script type="text/javascript" src="/js/main.js"></script>
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script type="text/javascript" src="/js/index.js"></script>
  <!-- fontsAwesome -->
  <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
  <!-- CSS -->
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
</head>

<body>
  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg fixed-top ">
      <div class="container">
        <a href="/" class="navbar-brand hvUenpLogo">
          <img src="{{ asset('img/hv-uenp.png') }}" alt="Logo HV">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <ion-icon class="navbar-toggler-icon" name="menu"></ion-icon>
        </button>
        <div class="navbar-collapse" id="navbarSupportedContent" style="justify-content: center; text-align: center;">
          <ul class="navbar-nav ms-auto">
            @auth
            @can('user-page')
            <li class="nav-item">
              <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="/appointments/show" class="nav-link">Agendamentos</a>
            </li>
            <li class="nav-item">
              <a href="/pets/show" class="nav-link">Meus pets</a>
            </li>
            <li class="nav-item">
              <a href="/dashboard" class="nav-link">Perfil</a>
            </li>
            @elsecan('admin-page')
            <li class="nav-item">
              <a href="/admin/dashboard" class="nav-link">Perfil</a>
            </li>
            @endcan

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
      <div class="col-lg-6 col-md-12 col-sm-12">
        <p class="p-small statement">Copyright &copy; <a href="#">PetsOn 2021</a></p>
      </div> <!-- end of col -->
      <!-- <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <ul class="list-unstyled li-space-lg p-small">
              <li><a href="/">Home</a></li>
              <li><a href="/login">Entrar</a></li>
              <li><a href="/register">Cadastrar</a></li>
              <li><a href="/appointments/show">Agendamentos</a></li>
              <li><a href="/pets/show">Meus pets</a></li>
            </ul>
          </div> 
        </div>  enf of row
      </div> end of container -->
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="{{asset('site/jquery.js')}}"></script>
  <script src="{{asset('site/bootstrap.js')}}"></script>
</body>

</html>