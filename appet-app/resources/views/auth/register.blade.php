@section('title', 'PetsOn | Registrar-se')
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
    <x-jet-authentication-card class="containerCad">
        <x-slot name="logo">
            
        </x-slot>

    <link rel="stylesheet" href="/css/user/forms.css">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Cadastrar
                    </span>
                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="name" class="input100" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('Nome completo') }}"/>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="cpf" class="input100" type="text" name="cpf" required autocomplete="new-cpf" placeholder="{{ __('CPF') }}"/>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="rg" class="input100" type="text" name="rg" required autocomplete="new-rg" placeholder="{{ __('RG') }}"/>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="telefone" class="input100" type="text" name="telefone" required autocomplete="new-telefone" placeholder="{{ __('Telefone') }}"/>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="endereco" class="input100" type="text" name="endereco" required autocomplete="new-endereco" placeholder="{{ __('Endereço') }}"/>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="email" class="input100" type="email" name="email" :value="old('email')" required placeholder="{{ __('E-mail') }}"/>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="password" class="input100" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Senha') }}"/>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <x-jet-input id="password_confirmation" class="input100" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirmar Senha') }}"/>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                    @endif

                    <div class="container-login100-form-btn">
                        <x-jet-button class="login100-form-btn">
                        {{ __('Cadastrar-se') }}
                        </x-jet-button>
                    </div>

                    <div class="text-center p-t-20">
                        <a class="txt" href="{{ route('login') }}">
                            {{ __('Já está registrado?') }}
                        </a>
                    </div>
                </form>
                <div class="login100-pic">
                    <img src="{{ asset('./img/2.png') }}" alt="self cachorro">
                </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
