@extends('layouts.main')

@section('title', 'APPet | Agendar nova consulta')
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Agendar nova consulta</h1>
    <form action="/appointments" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="date">Selecione uma data para para consulta: </label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="hour">Selecione o horário da consulta:</label>
            <select name="hour" id="hour" class="form-control">
                <option value="08:00:00">8:00</option>
                <option value="10:00:00">10:00</option>
                <option value="14:00:00">14:00</option>
                <option value="16:00:00">16:00</option>
            </select>
        </div>
        <div class="form-group">
            <label for="area_consulta">Selecione a area de consulta:</label>
            <select name="area_consulta" id="area_consulta" class="form-control">
                <option value="Oftalmologista">Oftalmologista</option>
                <option value="Clínico Geral">Clínico Geral</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Faça uma breve observação sobre o que seu pet tem:</label>
            <textarea 
                name="descricao" 
                class="form-control" 
                id="descricao" 
                placeholder="Faça uma breve observação sobre o que seu pet tem..."
            ></textarea>
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
            <input type="submit" class="btn btn-primary" value="Criar nova consulta">
        </div> 
    </form>
</div>
@endsection