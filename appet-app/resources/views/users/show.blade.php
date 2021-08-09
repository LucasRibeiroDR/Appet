@extends('layouts.main')

@section('title', 'APPet | Apresentar Usuário')
@section('content')

<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Usuário</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        {{-- @if(count($users) > 0) --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="d-flex ">
                            <a class="btn btn-info edit-btn" href="/user/edit/{{$user->id}}">
                                    <ion-icon name="create-outline"></ion-icon>
                                    Editar
                            </a>
                            <form action="/user/{{ $user->id }}" method="POST">
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
        {{-- @else
            <p class="youDontHavePets">Você ainda não tem usuários, <a href="/user/create">adicionar usuário</a></p>
        @endif --}}
    </div>
</div>
@endsection