@extends('layouts.main')

@section('title', 'APPet | Meus Pets')
@section('content')
<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Pets</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        @if(count($pets) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Especie</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Data de nasc.</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->especie }}</td>
                        <td>{{ $pet->raca }}</td>
                        <td>{{ $pet->data_nascimento->format('d-m-Y') }}</td>
                        <td class="d-flex ">
                            <a class="btn btn-info edit-btn" href="/pets/edit/{{$pet->id}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Editar
                            </a>
                            <form action="/pets/{{ $pet->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>
                                        Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="youDontHavePets">Você ainda não tem pets cadastrados, <a href="/pets/create">adicionar pets</a></p>
        @endif
    </div>
</div>
@endsection
