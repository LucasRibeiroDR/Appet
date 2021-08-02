<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="pet.ico" type="image/x-icon">
        <title>Cats&Dogs | app</title>
    </head>
    <body >
        <div>
            <div style="text-align:center; font-size:1rem;">
                <p>Hello, World!!!</p>
                <a href="/user/create">User create</a>
                <a href="/pets/create">Pets create</a>
                <a href="/dashboard">Dashboard</a>
                <a href="/pets/show">Meus pets</a>
                <a href="/appointments/show">Agendamentos</a>
                @guest
                    <a href="/login">Entrar</a>
                    <a href="/register">Criar Conta</a>
                @endguest
            </div>
            <div style="text-align:center; font-size:2rem;">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </body>
</html>
