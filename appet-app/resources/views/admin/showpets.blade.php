@extends('layouts.admin')

@section('title', 'PetsOn | Pets')
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
        <h1>Pets</h1>
    </div>
    <div id="search-container" class="col-md-3">
        <h1>Busque um animal</h1>
        <form action="/admin/pets" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
            <a href="/admin/pets" class="btn btn-primary">Limpar</a>
        </form>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        @if (count($pets) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do dono</th>
                    <th scope="col">Nome do Animal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>

                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $pet->user->name }}</td>
                            <td>{{ $pet->name }}</td>
                            @if($pet->status ==1)
                            <td>Vivo</td>
                            @else
                                <td>Morto</td>
                            @endif

                            <td class="d-flex ">
                                <a class="btn btn-info edit-btn" title="Editar Pet" href="/admin/edit-pet/{{$pet->id}}">
                                    <ion-icon name="create-outline"></ion-icon>Editar
                                </a>
                                <form action="/admin/delete-pet/{{ $pet->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
        @elseif (count($pets) == 0 && $search)
            <span>{{ $search  }} não encontrado</span>
        @endif
    </div>
</div>
@endsection
