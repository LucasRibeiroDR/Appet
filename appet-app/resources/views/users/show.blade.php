@extends('layouts.admin')

@section('title', 'PetsOn | Apresentar Usuário')
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
        @else
        <p class="youDontHavePets">Ainda não tem usuários, <a href="/admin/create-user">adicionar usuário</a></p>
        @endif
    </div>
</div>
@endsection