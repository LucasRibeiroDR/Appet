<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Bob Esponja',
            'cpf' => '12378945602',
            'rg' => '321654987',
            'telefone' =>'35422127',
            'endereco' =>'Fenda do biquini',
            'email' => 'bob@teste.com',
            'student'=>'Sim',
            'ra'=>'3216548913',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => 'Patrick Estrela',
            'cpf' => '28180155617',
            'rg' => '28180155617',
            'telefone' =>'35422127',
            'endereco' =>'Fenda do biquini',
            'email' => 'patrick@teste.com',
            'student'=>'Não',
            'ra'=>'321654896699',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('user');

    }
}
