@section('title', 'PetsOn | Login')
@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error) 
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
<x-guest-layout>

    <link rel="stylesheet" href="/css/user/forms.css">

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic">
                    <img src="{{ asset('./img/1.png') }}" alt="calendario">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="email" class="input100" type="email" name="email" :value="old('email')" required autofocus placeholder="E-mail" />
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="password" class="input100" type="password" name="password" required autocomplete="current-password" placeholder="Senha"/>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <x-jet-button class="login100-form-btn">
                            {{ __('Entrar') }}
                        </x-jet-button>
                    </div>

                    <div class="text-center p-t-20">
                        @if (Route::has('password.request'))
                        <a class="txt" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                        @endif
                    </div>

                    <div class="text-center p-t-136">
                        <a href=""></a></p>
                        <a class="txt" href="{{ route('register') }}">
                            Registre-se
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>