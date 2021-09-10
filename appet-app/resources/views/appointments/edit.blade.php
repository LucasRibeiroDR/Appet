@extends('layouts.main')

@section('title', 'PetsOn | Editando consulta')
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

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editar consulta</h1>
  <form action="/appointments/update/{{ $appointment->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="date">Selecione a data: </label>
      <input type="date" name="date" class="form-control" id="date" value="{{$appointment->date->format('Y-m-d')}}">
    </div>

    <div class="form-group">
      <label for="area_consulta">Selecione a area de consulta:</label>
      <select name="area_consulta" id="area_consulta" class="form-control">
        <option value="Oftalmologista" {{ $appointment->area_consulta == "Oftalmologista" ? "selected='selected'" : ""}}>Oftalmologista</option>
        <option value="Clínico Geral" {{ $appointment->area_consulta == "Clínico Geral" ? "selected='selected'" : ""}}>Clínico Geral</option>
      </select>
    </div>
    <div class="form-group">
      <label for="descricao">Faça uma breve observação sobre o que seu pet tem:</label>
      <textarea name="descricao" class="form-control" id="descricao">{{$appointment->descricao}}</textarea>
    </div>
    <div class="form-group">
      <label for="pet_id">Selecione seu Pet</label>
      <select name="pet_id" id="pet_id" class="form-control">
        @foreach ($pets as $pet)
        <option value="{{ $pet->id }}">{{ $pet->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Editar consulta">
    </div>
  </form>
</div>
@endsection