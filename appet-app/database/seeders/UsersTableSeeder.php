<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

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
            'cpf' => '123.456.789-00',
            'rg' => '12.345.678-9',
            'telefone' =>'(77)77777-7777',
            'endereco' =>'Fenda do biquini',
            'email' => 'bob@teste.com',
            'student'=>'Sim',
            
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('user');

        $user = User::create([
            'name' => 'Patrick Estrela',
            'cpf' => '123.456.789-01',
            'rg' => '12.345.678-1',
            'telefone' =>'(55)5555-5555',
            'endereco' =>'Fenda do biquini',
            'email' => 'patrick@teste.com',
            'student'=>'Não',
            
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('user');
    }
}
