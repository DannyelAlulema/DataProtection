<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Traits\DocumentValidation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, DocumentValidation;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'ci_ruc' => [ 'required', 'string', 'min:10', 'max:13', 'unique:users',
                Rule::requiredIf(function () use ($input) {
                    return $this->validCi($input['ci_ruc']);
                })],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => [ 'required', 'string', 'min:10', 'max:10' ],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'ci_ruc' => $input['ci_ruc'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
