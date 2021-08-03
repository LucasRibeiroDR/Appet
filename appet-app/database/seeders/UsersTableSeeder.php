<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
        DB::table('users')->insert([
            'name' => 'Bob Esponja',
            'cpf' => '12378945602',
            'rg' => '321654987',
            'telefone' =>'35422127',
            'endereco' =>'Fenda do biquini',
            'email' => 'bob@teste.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
