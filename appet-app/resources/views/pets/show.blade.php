@extends('layouts.main')
@section('title', 'PetsOn | Meus Pets')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

{{--public function calcularDataNascimento($data) {
    $idade = 0;
    $data_nascimento = date('Y-m-d', strtotime($data));
    $data = explode("-",$data_nascimento);
    $anoNasc  = $data[0];
    $mesNasc  = $data[1];
    $diaNasc  = $data[2];

    $anoAtual = date("Y");
    $mesAtual = date("m");
    $diaAtual = date("d");

    $idade = $anoAtual - $anoNasc;
    if ($mesAtual < $mesNasc){
        $idade -= 1;
    } elseif (($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc)){
             $idade -= 1;
    }
    return ($idade);
}--}}


<div class="containerMPets">
    <div class="text-center p-3">
        <h1>Meus Pets</h1>
    </div>
    <div class="dashboard-pets-container">
        @if(count($pets) > 0)
        <div class="col-md-10 offset-md-1">
            <div class="form-group mt-3">
                <form action="/pets/create" class="mb-3">
                    <button class="editProfile btn btn-block btn-primary-">Cadastrar novo pet</button>
                </form>
            </div>
        </div>
        @foreach($pets as $pet)
        <!-- <td scropt="row">{{ $loop->index + 1 }}</td> -->
        <ul style="list-style-type: none;">
            <li style="display: inline; margin: 0 0 0 15px;">
                <div class="card" style="width: 18rem; background-color: #e5f1e2;">
                    <div class="card-body">
                        <h2 class="card-title" style="color: #305a34;">{{ $pet->name }}</h2>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $pet->especie }}</h5>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $pet->raca }}</h5>
                        <h5 class="card-subtitle mb-2 text-muted">{{ $pet->data_nascimento->format('d-m-Y') }}</h5>

                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <a class="btn btn-info edit-btn" href="/pets/edit/{{$pet->id}}">
                                            <ion-icon name="create-outline"></ion-icon>
                                            Editar
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div action="/pets/{{ $pet->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <ion-icon name="trash-outline"></ion-icon>
                                            Deletar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
        @else
        <div class="col-md-10 offset-md-1">
            <div class="form-group">
                <form action="/pets/create" class="mb-3">
                    <button class="editProfile btn btn-block btn-danger">Você ainda não tem pets cadastrados, <strong>adicionar pets</strong></button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection