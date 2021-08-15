@section('title', 'APPet | Registrar-se')
@section('content')

<x-guest-layout>

    <link rel="stylesheet" href="/css/styles.css">

    <div class="justify">
        <div class="containerCad">

            <div class="cadastro-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="titleText">Cadastrar</h2>
                    <div>
                        <x-jet-label class="alignText" for="name" value="{{ __('Nome completo:') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Seu nome..." style="border-color: #1D4B80;" />
                    </div>
                    <div>
                        <div class="blc">
                            <x-jet-label class="alignText" for="cpf" value="{{ __('CPF:') }}" />
                            <x-jet-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" required autocomplete="new-cpf" placeholder="000.000.000-00" style="border-color: #1D4B80;" />
                        </div>

                        <div class="blc">
                            <x-jet-label class="alignText" for="rg" value="{{ __('RG:') }}" />
                            <x-jet-input id="rg" class="block mt-1 w-full" type="text" name="rg" required autocomplete="new-rg" placeholder="00.000.000-0" style="border-color: #1D4B80;" />
                        </div>
                    </div>
                    <div>
                        <x-jet-label class="alignText" for="telefone" value="{{ __('Telefone:') }}" />
                        <x-jet-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" required autocomplete="new-telefone" placeholder="(00) 00000-0000" style="border-color: #1D4B80;" />
                    </div>
                    <div>
                        <x-jet-label class="alignText" for="endereco" value="{{ __('Endereço:') }}" />
                        <x-jet-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" required autocomplete="new-endereco" placeholder="Coloque seu endereço..." style="border-color: #1D4B80;" />
                    </div>
                    <div>
                        <x-jet-label class="alignText" for="email" value="{{ __('E-mail:') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Coloque seu email..." style="border-color: #1D4B80;" />
                    </div>
                    <div class="blc">
                        <x-jet-label class="alignText" for="password" value="{{ __('Senha:') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Informe sua senha..." style="border-color: #1D4B80;" />
                    </div>

                    <div class="blc">
                        <x-jet-label class="alignText" for="password_confirmation" value="{{ __('Confirmar Senha:') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme sua senha..." style="border-color: #1D4B80;" />
                    </div>
                    <br><br><br>
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

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('login') }}">
                            {{ __('Já está registrado?') }}
                        </a>

                        <x-jet-button class="btn btn-primary ml-4">
                            {{ __('Cadastrar-se') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
            <div class="imgLogin">
                <img src="./img/2.png" alt="calendario">
            </div>
        </div>
    </div>
</x-guest-layout>