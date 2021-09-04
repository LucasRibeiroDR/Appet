@extends('layouts.admin')

@section('title', 'APPet | Consultas')
@section('content')
    <div>
        <div class="col-md-10 offset-md-1 dashboard-title-container">
            <h1>Pets</h1>
        </div>
        <div class="col-md-10 offset-md-1 dashboard-pets-container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Dono do animal</th>
                    <th scope="col">Nome do Pet</th>
                    <th scope="col">Dia da Consulta</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $appointment->user->name }}</td>
                        <td>{{ $appointment->pet->name}}</td>
                        <td>{{ $appointment->date->format('d/m/Y') }}</td>
                        <td>{{ $appointment->timeslot }}</td>
                        <td>{{ $appointment->descricao }}</td>
                        <td class="d-flex ">
                            {{--<a class="btn btn-info edit-btn" href="/pets/edit/{{$pet->id}}">
                                <ion-icon name="create-outline"></ion-icon>
                                Editar
                            </a>--}}
                            {{--<form action="/pets/{{ $user->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    Deletar
                               </button>
                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{-- @else
                <p class="youDontHavePets">Você ainda não tem pets, <a href="/pets/create">adicionar pets</a></p>
            @endif --}}
        </div>
    </div>
@endsection
