@extends('layouts.main')

@section('title', 'APPet | Agendamentos')
@section('content')
<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Agendamentos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">

        @if(count($appointment) > 8)
        <table class="table">
            <div class="form-group">
                <a class="btn btn-primary" href="/appointments/create">Marcar consulta</a>

            </div>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pet</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($appointment as $appointments)
                <tr>
                    <td scropt="row">{{ $loop->remaining+1 }}</td>
                    @foreach ($pets as $pet)
                    @if($pet->id=== $appointments->pet_id )
                    <td>{{$pet->name }}</td>
                    @endif
                    @endforeach
                    <td>{{ $appointments->date->format('d/m/Y') }}</td>
                    <td>{{ $appointments->hour}}</td>
                    <td>{{ $appointments->descricao }}</td>
                    <td class="d-flex ">
                        <a class="btn btn-primary" href="/appointments/edit/1">
                            <ion-icon name="create-outline"></ion-icon>Editar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="youDontHaveConsults">Você ainda não marcou consultas <a class="btn btn-primary" href="/appointments/create">Marcar consulta</a></p>
        @endif
        <div class="form-group">
            <p class="totalConsults">Total de consultas: {{count($appointment)}}</p>
        </div>
    </div>
</div>
@endsection