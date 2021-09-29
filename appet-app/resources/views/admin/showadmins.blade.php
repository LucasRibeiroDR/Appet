@extends('layouts.admin')

@section('title', 'PetsOn | Admins')
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
        <h1>Admins</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-users-container" style="
    margin-bottom: 120px;">
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
                        <a class="btn btn-info edit-btn" href="/admin/edit-admin/{{$admin->id}}">
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
        <div class="col-md-10 offset-md-1">
            <div class="form-group mt-3">
                <form action="/admin/create-admin" class="mb-3">
                    <button class="editProfile btn btn-block btn-primary-">Criar novo adm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection