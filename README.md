<h1 align="center">
  <strong>APPet <img align="center" height="40" src="./appet-app/public/img/pet.ico"></strong>
</h1>
<div align="center">

**Projeto desenvolvido para hospital veterinário da UENP**

</div>

<div align="center">
  <a href="https://www.php.net/" target="_blank"><img alt="PHP" src="https://img.shields.io/badge/PHP-%235466B8.svg?&style=flat&logo=php&logoColor=white"/></a>
  <a href="https://getcomposer.org/" target="_blank"><img alt="Composer" src="https://img.shields.io/badge/Composer-%23ffffff.svg?&style=flat&logo=composer&logoColor=%238B4513"/></a>
  <a href="https://laravel.com/" target="_blank"><img alt="Laravel" src="https://img.shields.io/badge/Laravel-%23ff2d20.svg?&style=flat&logo=laravel&logoColor=white"/></a>
  <a href="https://www.mysql.com/" target="_blank"><img alt="MySQL" src="https://img.shields.io/badge/MySQL-%23ADD8E6.svg?&style=flat&logo=mysql&logoColor=black"/></a>
  <a href="https://git-scm.com/" target="_blank"><img alt="Blade" src="https://img.shields.io/badge/Git-%23ffffff.svg?&style=flat&logo=git&logoColor=%23FF4500"/></a>
</div>

## Pré-requisitos

- Você precisa dos seguintes serviços instalados no seu computador:

```
GIT 2.32.0
XAMPP ou (PHP 8.0.8 e MYSQL)
Composer 2.1.5
Laravel 8.x
```

## Instalando
- Primeiramente é necessária uma base de dados, para isso é preciso criar uma:
```SQL
CREATE DATABASE petsdb;
```
- Clone o projeto para sua máquina (coloque na pasta do seu servidor WEB):
```php
git clone https://github.com/LucasRibeiroDR/Appet.git
```
- Entre no diretório **appet-app**.
- Copie o arquivo .env.example e nomeie .env:

```php
cp .env.example .env
```
- Configurar o arquivo .env com as suas informações:
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=petsbd
DB_USERNAME=root
DB_PASSWORD=
```
- Rodar o comando para instalação (pode demorar alguns minutos):

```php
$ composer install 
```
- Caso primeiro comando não funcione rode o seguinte comando:
```php
$ composer update 
```

<!-- - Rodar os comandos para migrar o banco de dados com alguns dados de teste:
```php
$ php artisan migrate --seed
``` -->
- Rodar os comandos para migrar o banco de dados:
```php
$ php artisan migrate
``` 
## Abrir o servidor backend

- Para rodar o servidor backend utilize o comando:

```
php artisan serve
```
