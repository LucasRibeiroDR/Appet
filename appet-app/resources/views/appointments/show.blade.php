<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPet | Agendamento</title>
</head>
<body>
    <div style="text-align:center; font-size:2rem;">
        <p>Agendamento</p>
        <a href="/appointments/create">Criar consulta</a>

        <p>Total de consultas: {{ count($appointment) }}</p>
        <a href="/">Home</a>
    </div>
</body>
</html>