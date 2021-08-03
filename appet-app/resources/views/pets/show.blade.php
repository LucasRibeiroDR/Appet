<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Meus Pets</title>
</head>
<body>
    <h2>Meus pets</h2>

    <div class="col-md-10 offset-md-1 dashboard-pets-container">
        @if(count($pets) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Especie</th>
                    <th scope="col">Raça</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->especie }}</td>
                        <td>{{ $pet->raca }}</td>
                        <td>
                            <a href="/pets/edit/{{ $pet->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                            <form action="/pets/{{ $pet->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
        @else
        <p>Você ainda não tem pets, <a href="/pets/create">adicionar pets</a></p>
        @endif
    </div>
    

    <a href="/">Voltar para o menu</a>
</body>
</html>