@extends('layouts.admin')

@section('title', 'PetsOn | Pets')
@section('content')
<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Usuarios</h1>
    </div>

    <div id="search-container" class="col-md-3">
        <h1>Busque um usuário</h1>
        <form action="/admin/users" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
            <a href="/admin/users" class="btn btn-primary">Limpar</a>
        </form>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        @if(count($users) > 0)
        <table class="table">
            <thead>
                <tr>
{{--                <th scope="col">#</th>--}}
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @if($user->hasRole('user'))
                        <tr>
{{--                        <td scropt="row">{{ $loop->index + 1 }}</td>--}}
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
                                <a class="btn btn-dark create-btn" href="/admin/calendar/{{$user->id}}">
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
            <p class="youHaveConsults"><a href="/admin/create-user">Criar novo usuário</a></p>
        </div>

        @elseif(count($users) == 0 && $search)
            <p>{{ $search }} não encontrado</p>
        @else
            <p class="youDontHavePets">Você ainda não usuários, <a href="/admin/create-user">adicionar usuário</a></p>
        @endif
    </div>
</div>
@endsection
