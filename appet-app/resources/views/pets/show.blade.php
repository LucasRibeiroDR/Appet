@extends('layouts.main')
@extends('layouts.app')
@section('title', 'APPet | Meus Pets')
@section('content')

<x-guest-layout>
    <div class="containerMPets">
        <div class="text-center p-3">
            <h1>Meus Pets</h1>
        </div>

        <div class="dashboard-pets-container">
            @if(count($pets) > 0)
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
            <p class="youDontHavePets">Você ainda não tem pets cadastrados, <a href="/pets/create">adicionar pets</a></p>
            @endif
        </div>
    </div>
</x-guest-layout>
@endsection