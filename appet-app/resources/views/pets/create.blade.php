<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="pet.ico" type="image/x-icon">
    <title>Cats&Dogs | Criar animal</title>
</head>
<body>
    <h2>Crie seu animal</h2>

    
    <form action="/pets" method="POST">
    @csrf
        <div>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" placeholder="nome do animal">
        </div>
        <div>
            <label for="raca">Raça</label>
            <input type="text" id="raca" name="raca" placeholder="Raça do animal">
        </div>
        <div>
            <label for="pelugem">Pelagem</label>
            <input type="text" id="pelugem" name="pelugem" placeholder="Pelagem do animal">
        </div>
        <div>
            <label for="especie">Especie</label>
            <input type="text" id="especie" name="especie" placeholder="Especie do animal">
        </div>
        <div>
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" placeholder="Descreva algo">teste</textarea>
        </div>
        <div>
            <label for="area_atendimento">Area de Atendimento</label>
            <input type="text" id="area_atendimento" name="area_atendimento" placeholder="Area de atendimento">
        </div>
        <div>
            <label for="data_nascimento">Data de nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento">
        </div>
        <div>
            <label for="castrado">O animal é castrado?</label>
            <select name="castrado" id="castrado">
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Adicionar Animal">
        </div>
        

    
    
    </form>
    


    <a href="/">Voltar ao menu principal</a>
</body>
</html>