<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string',  'max:255', 'unique:users'],
            'rg' => ['required', 'string',  'max:255', 'unique:users'],
            'telefone' => ['required', 'string',  'max:255'],
            'endereco' => ['required', 'string',  'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'student'=> ['required', 'string', ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'cpf' =>$input['cpf'],
            'rg' =>$input['rg'],
            'telefone' =>$input['telefone'],
            'endereco' =>$input['endereco'],
            'email' => $input['email'],
            'student' => $input ['student'],
            'ra' => $input ['ra'],
            'password' => Hash::make($input['password']),
        ]);

        $user->assignRole('user');

        return $user;
    }
}
