<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class AdminCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Super Admin',
            'cpf' => '0000011100',
            'rg' => '101334567',
            'telefone' => '4335421200',
            'endereco' => 'admin',
            'email' => 'super@admin.com',
            'student'=>'Não',
            'ra'=>'3216548963321',
            'password' => Hash::make('superadmin'),
        ]);

        $admin->assignRole('Super Admin');

        $admin = User::create([
            'name' => 'admin',
            'cpf' => '0000000000',
            'rg' => '101234567',
            'telefone' => '4335420000',
            'endereco' => 'admin',
            'email' => 'admin@admin.com',
            'student'=>'Não',
            'ra'=>'3216548966121',
            'password' => Hash::make('adminadmin'),
        ]);

        $admin->assignRole('admin');
    }
}
