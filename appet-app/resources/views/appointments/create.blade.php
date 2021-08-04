<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPet | Crie sua consulta</title>
</head>
<body>
    <div style="text-align:center; font-size:2rem;">
        <p>Nova consulta</p>


        <form action="/appointments" method="POST">
        @csrf
            <div>
                <label for="dia_consulta">Selecione a data: </label>
                <input type="date" name="dia_consulta" id="dia_consulta">
            </div>
            <div>
                <label for="time">Selecione o horário:</label>
                <select name="time" id="time">
                    <option value="8:00">8:00</option>
                    <option value="10:00">10:00</option>
                    <option value="14:00">14:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </div>
            <div>
                <label for="area_consulta">Selecione a area de consulta:</label>
                <select name="area_consulta" id="area_consulta">
                    <option value="Oftalmologista">Oftalmologista</option>
                    <option value="Clínico Geral">Clínico Geral</option>
                </select>
            </div>
            <div>
                <label for="descricao">Faça uma breve observação sobre o que seu pet tem:</label>
                <textarea name="descricao" id="descricao"></textarea>
            </div>
            <label for="animal">Qual animal você escolhe?</label>
            <select name="animal" id="animal">
              @foreach ($pets as $pet)
                <option value="{{ $pet->id }}">{{ $pet->name }}</option>
              @endforeach
            </select>

            <input type="submit" value="Criar Consulta">
        
        </form>
        <a href="/">Home</a>
    </div>
</body>
</html>