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
            'cpf' => '999.999.999-99',
            'rg' => '99.999.999-9',
            'telefone' => '(99)99999-9999',
            'endereco' => 'Avenida dos Super Admins',
            'email' => 'super@admin.com',
            'student'=>'Não',
            'ra'=>'202111113030099',
            'password' => Hash::make('superadmin'),
        ]);

        $admin->assignRole('Super Admin');

        $admin = User::create([
            'name' => 'Admin',
            'cpf' => '888.888.888-88',
            'rg' => '88.888.888-8',
            'telefone' => '(88)88888-8888',
            'endereco' => 'Avenida dos Admins',
            'email' => 'admin@admin.com',
            'student'=>'Não',
            'ra'=>'202111113030098',
            'password' => Hash::make('adminadmin'),
        ]);

        $admin->assignRole('admin');
    }
}
