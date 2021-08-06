@extends('layouts.main')

@section('title', 'APPet | Agendamentos')
@section('content')
<div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Agendamentos</h1>   
    </div>
    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        <div class="form-group">
            <a class="btn btn-primary" href="/appointments/create">Criar consulta</a>
            
            @can('edit-appointment')
                <a class="btn btn-primary" href="/appointments/edit/1">
                Editar consulta
                </a>
            @endcan
            
        </div>
        <div class="form-group">
            <p class="totalConsults">Total de consultas: {{count($appointment)}}</p>
        </div>
    </div>
</div>
@endsection