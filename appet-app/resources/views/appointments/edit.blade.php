<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editando Appointment</title>
</head>
<body>
    <div>
        <h2>Edição de Appointment</h2>
        <form action="/appointments/update/{{ $appointment->id }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="date">Selecione a data: </label>
                <input type="date" name="date" id="date" value="{{$appointment->date->format('Y-m-d')}}">
            </div>
            <div>
                <label for="hour">Selecione o horário:</label>
                <select name="hour" id="hour">
                    <option value="08:00:00" {{ $appointment->hour == "08:00:00" ? "selected='selected'" : ""}}>8:00</option>
                    <option value="10:00:00" {{ $appointment->hour == "10:00:00" ? "selected='selected'" : ""}}>10:00</option>
                    <option value="14:00:00" {{ $appointment->hour == "14:00:00" ? "selected='selected'" : ""}}>14:00</option>
                    <option value="16:00:00" {{ $appointment->hour == "16:00:00" ? "selected='selected'" : ""}}>16:00</option>
                </select>
            </div>
            <div>
                <label for="area_consulta">Selecione a area de consulta:</label>
                <select name="area_consulta" id="area_consulta">
                    <option value="Oftalmologista" {{ $appointment->area_consulta == "Oftalmologista" ? "selected='selected'" : ""}}>Oftalmologista</option>
                    <option value="Clínico Geral" {{ $appointment->area_consulta == "Clínico Geral" ? "selected='selected'" : ""}}>Clínico Geral</option>
                </select>
            </div>
            <div>
                <label for="descricao">Faça uma breve observação sobre o que seu pet tem:</label>
                <textarea name="descricao" id="descricao">{{$appointment->descricao}}</textarea>
            </div>
            <label for="pet_id">Qual animal você escolhe?</label>
            <select name="pet_id" id="pet_id">
              @foreach ($pets as $pet)
                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
              @endforeach
            </select>

            <input type="submit" value="Editar Consulta">
        </form>
    </div>

    <a href="/">Voltar ao menu</a>
</body>
</html>