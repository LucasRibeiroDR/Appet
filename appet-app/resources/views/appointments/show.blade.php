@extends('layouts.main')

@section('title', 'APPet | Agendamentos')
@section('content')
<div>
    <h1>Agendamentos</h1>   
    <div>
        <a class="btn btn-info edit-btn" href="/appointments/create">Criar consulta</a>
        {{-- <!-- <a class="btn btn-info edit-btn" href="/appointments/edit/{{$appointment->id}}">
            Editar consulta
        </a> --> --}}
        <a class="btn btn-info edit-btn" href="/appointments/edit/1">
            Editar consulta
        </a>
    </div>
    <p>Total de consultas: {{count($appointment)}}</p>
</div>
@endsection