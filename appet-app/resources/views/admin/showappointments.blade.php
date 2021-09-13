@extends('layouts.admin')

@section('title', 'PetsOn | Consultas')
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
        <h1>Tabela de Consultas</h1>
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
                        <a class="btn btn-info edit-btn" href="#" name="Editar">
                            <ion-icon name="create-outline"></ion-icon> Editar
                        </a>
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="candelar" class="btn btn-danger delete-btn" disabled>
                                <ion-icon name="close"></ion-icon> Cancelar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection