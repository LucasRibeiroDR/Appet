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

<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Agendamentos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">

        @if(count($appointments) > 0)
        <table class="table">
            <div class="form-group">
                <p class="youHaveConsults"><a href="/calendar">Marcar consulta</a></p>
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

                @foreach($appointments as $appointment)
                <tr>
{{--                    <td scropt="row">{{ $loop->remaining + 1 }}</td>--}}
                    <td>#</td>
                    <td>{{$appointment->pet->name }}</td>
                    <td>{{ $appointment->date->format('d/m/Y') }}</td>
                    <td>{{ $appointment->timeslot }}</td>
                    <td>{{ $appointment->descricao }}</td>
                    <td class="d-flex ">
                        <a class="btn btn-info edit-btn" href="/appointments/edit/{{ $appointment->id }}">
                            <ion-icon name="create-outline"></ion-icon>Editar
                        </a>
                        <form action="/appointments/{{ $appointment->id }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon>
                                        Cancelar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="form-group">
            <p class="youDontHavePets">Você ainda não tem consultas marcadas, <a  href="/calendar">criar nova consulta</a></p>

            @can('edit-appointment')
                <a class="btn btn-primary" href="/appointments/edit/1">
                Editar consulta
                </a>
            @endcan

        </div>
        @endif
{{--        <div class="form-group">--}}
{{--            <p class="totalConsults">Total de consultas: {{count($appointment)}}</p>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
