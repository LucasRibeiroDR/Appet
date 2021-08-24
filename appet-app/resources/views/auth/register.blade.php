@section('title', 'APPet | Registrar-se')
@section('content')
                                     
<x-guest-layout>
    <x-jet-authentication-card class="containerCad">
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4 cadastro-content" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="titleText">Cadastrar</h2>
            <div>
                <x-jet-label class="alignText" for="name" value="{{ __('Nome completo:') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Seu nome..." style="border-color: #1D4B80;" />
            </div>
            
            <div class="blc">
                <x-jet-label class="alignText" for="cpf" value="{{ __('CPF:') }}" />
                <x-jet-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" required autocomplete="new-cpf" placeholder="000.000.000-00" style="border-color: #1D4B80;" />
            </div>

            <div class="mt-4">
                <x-jet-label for="rg" value="{{ __('RG') }}" />
                <x-jet-input id="rg" class="block mt-1 w-full" type="text" name="rg" required autocomplete="new-rg" placeholder="00.000.000-0" />
            </div>

            <div class="mt-4">
                <x-jet-label for="telefone" value="{{ __('Telefone') }}" />
                <x-jet-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" required autocomplete="new-telefone" placeholder="(00) 00000-0000" />
            </div>

            <div class="mt-4">
                <x-jet-label for="endereco" value="{{ __('Endereco') }}" />
                <x-jet-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" required autocomplete="new-endereco" placeholder="Coloque seu endereço..." />
            </div>


            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Coloque seu email..." />
            </div>

            <div class="mt-4">
                <x-jet-label for="student" value="{{ __('Estudante UENP') }}" />
                <select id="student" class="block mt-1 w-full" type="text" name="student" required autocomplete="new-student" onchange="exibir_ocultar()">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="mt-4 ra" id="ra_value">
                <x-jet-label for="ra" value="{{ __('RA') }}" />
                <x-jet-input id="ra" class="block mt-1 w-full" type="text" name="ra"  autocomplete="new-ra" placeholder="20XX111130300XX" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Informe sua senha..." />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme sua senha..." />
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

            <div class="flex items-center justify-end mt-4">
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
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
