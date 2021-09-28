@extends('layouts.main')

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

<div class="containerMPets">
    <div class="text-center p-3">
        <h1>Agendamentos</h1>
    </div>
    <div class="dashboard-pets-container">
        @if(count($appointments) > 0)
        <div class="col-md-10 offset-md-1">
            <div class="form-group mt-3">
                <form action="/calendar" class="mb-3">
                    <button class="editProfile btn btn-block btn-danger">Marcar consulta</button>
                </form>
            </div>
        </div>
        @foreach($appointments as $appointment)
        <ul style="list-style-type: none;">
            <li style="display: inline;  margin: 20px 0 0 20px; height: 240px !important;">
                <div class="card" style="width: 18rem; background-color: #e5f1e2;">
                    <div class="card-body">
                        <h2 class="card-title text-center" style="color: #305a34;">{{$appointment->pet->name }}</h2>
                        <p class="cardText mb-2">Data da consulta: {{ $appointment->date->format('d/m/Y') }}</p>
                        <p class="cardText mb-2">Hora da consulta: {{ $appointment->timeslot }}</p>
                        <p class="cardText mb-2">Descrição: {{ $appointment->descricao }}</p>

                        <table>
                            <tr>
                                <td>
                                    <div>
                                        <a class="linkCard" href="/appointments/edit/{{ $appointment->id }}">
                                        <ion-icon name="create-outline"></ion-icon>
                                        Editar
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <div action="/appointments/{{ $appointment->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="linkCard">
                                            <ion-icon name="trash-outline"></ion-icon>
                                            Cancelar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
        @else
        <div class="col-md-10 offset-md-1">
            <div class="form-group">
                <form action="/calendar" class="mb-3">
                    <button class="editProfile btn btn-block btn-danger">Você ainda não tem consultas marcadas, <strong>criar nova consulta</strong></button>
                </form>
            </div>
        </div>
        @endif
        {{-- <div class="form-group">--}}
        {{-- <p class="totalConsults">Total de consultas: {{count($appointment)}}</p>--}}
        {{-- </div>--}}
    </div>
</div>
@endsection