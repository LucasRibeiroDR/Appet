<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editando Appointment</title>
</head>
<body>
    <h2>Edição de Appointment</h2>

    <form action="/appointment/update/{{ $appointment->id }}" method="POST">
        @csrf
        @method('PUT')
    </form>

    <a href="/">Voltar ao menu</a>
</body>
</html>