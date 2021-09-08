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

    <link rel="stylesheet" href="/css/styles.css">

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <div class="justify">
        <div class="container">
            <div class="imgLogin">
                <img src="./img/1.png" alt="calendario">
            </div>
            <div class="login-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="titleText">Login</h2>
                    <div>
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="E-mail" style="border-color: #1D4B80;"/>
                    </div>
                    <br>
                    <div class="mt-4">
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Senha" style="border-color: #1D4B80;"/>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm" style="color: #000;">{{ __('Lembre-se de mim.') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                        @endif

                        <x-jet-button class="btn btn-primary ml-4">
                            {{ __('Entrar') }}
                        </x-jet-button>
                    </div>
                    <br>
                    <p class="mb-2 text-muted" style="font-size: 14px;">Não tem conta? <a href="{{ route('register') }}">Registre-se</a></p>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>