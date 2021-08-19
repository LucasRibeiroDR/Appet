@extends('layouts.admin')

@section('title', 'APPet | Meus Pets')
@section('content')
<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Admins</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-users-container">
        {{-- @if(count($admins) > 0) --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    @can('edit-admin')
                        <th scope="col">Ações</th>
                    @endcan

                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    @if($admin->hasRole('admin'))
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $admin->name }}</td>
                            @can('edit-admin')
                                <td class="d-flex ">
                                    <a class="btn btn-info edit-btn" href="/pets/edit/{{$admin->id}}">
                                        <ion-icon name="create-outline"></ion-icon>
                                        Editar
                                    </a>
                            @endcan
                            @can('delete-admin')
                                <form action="/admin{{ $admin->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                            <ion-icon name="trash-outline"></ion-icon>
                                            Deletar
                                    </button>
                                </form>
                            @endcan
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div>
            <a class="btn btn-primary"href="/admin/create-admin">Criar novo adm</a>
        </div>

        {{-- @else
            <p class="youDontHavePets">Você ainda não tem pets, <a href="/pets/create">adicionar pets</a></p>
        @endif --}}
    </div>
</div>
@endsection
