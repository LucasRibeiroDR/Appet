<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editando pet</title>
</head>
<body>
    <h2>Edição de Pet</h2>

    <form action="/pets/update/{{ $pet->id }}" method="POST">
        @csrf
        @method('PUT')
            <div>
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="nome do animal" value="{{ $pet->name }}">
            </div>
            <div>
                <label for="raca">Raça</label>
                <input type="text" id="raca" name="raca" placeholder="Raça do animal" value="{{ $pet->raca }}">
            </div>
            <div>
                <label for="pelugem">Pelagem</label>
                <input type="text" id="pelugem" name="pelugem" placeholder="Pelagem do animal" value="{{ $pet->pelugem }}">
            </div>
            <div>
                <label for="especie">Especie</label>
                <input type="text" id="especie" name="especie" placeholder="Especie do animal"value="{{ $pet->especie }}">
            </div>
            <div>
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="{{ $pet->data_nascimento->format('Y-m-d') }}">
            </div>
            <div>
                <label for="castrado">O animal é castrado?</label>
                <select name="castrado" id="castrado">
                  <option value="0">Não</option>
                  <option value="1"{{ $pet->castrado == 1 ? "selected='selected'" : "" }}>Sim</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Salvar Pet">
            </div>
            
    
        
        
        </form>

    <a href="/">Voltar ao menu</a>
</body>
</html>