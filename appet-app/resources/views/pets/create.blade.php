@section('title', 'PetsOn | Novo Pet')

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
    <x-jet-validation-errors class="mb-4" />

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="width: 440px !important;">
                <form action="/pets" method="POST" enctype="multipart/form-data" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        Cadastrar Pet
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input required type="text" class="input100" id="name" name="name" placeholder="Nome do animal" maxlength=50>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input required type="text" class="input100" id="raca" name="raca" placeholder="Raça">
                    </div>
                    <div class="wrap-input100 validate-input">
                        <select required name="pelugem" id="pelugem" class="input100">
                            <option selected disabled>Cor da pelagem</option>
                            @foreach ($pelugens as $pelugem)
                            <option value="{{ $pelugem->name }}">{{ $pelugem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <select name="especie" id="especie" class="input100" onchange="hidden_show()">
                            <option selected disabled>Espécie</option>
                            <option value="Gato">Gato</option>
                            <option value="Cachorro">Cachorro</option>
                        </select>
                    </div>

                    <div id="porte_value" class="wrap-input100 validate-input">
                        <select id="porte" name="porte" class="input100">
                            <option selected disabled>Porte do animal</option> 
                            <option>Mini</option>
                            <option>Pequeno</option>
                            <option>Médio</option>
                            <option>Grande</option>
                            <option>Gigante</option>
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <label class="label100" for="data_nascimento">Data de Nascimento</label>
                        <input required type="date" class="input100" name="data_nascimento" id="data_nascimento">
                    </div>
                    <div class="wrap-input100 validate-input">
                        <select name="castrado" id="castrado" class="input100">
                            <option selected disabled>O animal é castrado?</option> 
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" value="Adicionar Animal">
                    </div>
                </form>
            </div>
        </div>
    </form>
</div>
@endsection
