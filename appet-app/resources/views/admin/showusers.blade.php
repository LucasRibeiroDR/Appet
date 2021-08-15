@extends('layouts.admin')

@section('title', 'APPet | Meus Pets')
@section('content')
<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Usuarios</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        @if(count($users) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @if($user->hasRole('user'))
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td class="d-flex ">
                                <a class="btn btn-info edit-btn" href="/admin/edit-user/{{$user->id}}">
                                        <ion-icon name="create-outline"></ion-icon>
                                        Editar
                                </a>
                                <a class="btn btn-dark create-btn" href="/admin/create-pet/{{$user->id}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Criar Pet
                                </a>
                                <a class="btn btn-dark create-btn" href="/admin/createAppointments/{{$user->id}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Criar Consulta
                                </a>

                                {{-- <form action="/pets/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                            <ion-icon name="trash-outline"></ion-icon>
                                            Deletar
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div>
            <a class="btn btn-primary"href="/admin/create-user">Criar novo usuário</a>
        </div>

        @else
            <p class="youDontHavePets">Você ainda não tem pets, <a href="/pets/create">adicionar pets</a></p>
        @endif
    </div>
</div>
@endsection
