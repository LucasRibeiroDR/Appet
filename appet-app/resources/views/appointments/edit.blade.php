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
                <label for="dia_consulta">Selecione a data: </label>
                <input type="date" name="dia_consulta" id="dia_consulta" value="{{}}">
            </div>
            <div>
                <label for="time">Selecione o horário:</label>
                <select name="time" id="time" value="{{}}">
                    <option value="8:00">8:00</option>
                    <option value="10:00">10:00</option>
                    <option value="14:00">14:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>
            <label for="animal">Qual animal você escolhe?</label>
            <select name="animal" id="animal" value="{{}}">
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