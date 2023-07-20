<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */


    public function create(array $input): User
    {

        $messages = [
            'name.required' => 'ui.nameRequired',
            'name.max' => 'ui.nameMax',
            'email.required' => 'ui.mailRequired',
            'email.email' => 'ui.mailEmail',
            'email.max' => 'ui.mailMax',
            'email.unique' => 'ui.mailUnique',
            'surname.required' => 'ui.surnameRequired',
            'surname.max' => 'ui.surnameMax',
            'password.required' => 'ui.pwdRequired',


        ];
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:App\Models\User,email',
                Rule::unique(User::class),
            ],
            'surname' => ['required', 'string', 'max:255'],
            'city' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            // 'message' => ['string'],
            'password' => $this->passwordRules(),
        ], $messages)->validate();



        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'city' => $input['city'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            // 'message' => ['string'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
