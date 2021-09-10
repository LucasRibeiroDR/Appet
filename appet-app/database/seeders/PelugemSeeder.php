<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PelugemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelugens')->insert([
            'name' => 'Branco',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Preto',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Marrom',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Cinza',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Caramelo (amarelo)',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Branco com manchas pretas',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Preto com manchas brancas',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Azulada',
        ]);
        DB::table('pelugens')->insert([
            'name' => 'Amarelo e branco',
        ]);

    }
}
