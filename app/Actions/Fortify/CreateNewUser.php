<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
use App\Models\Suppliers;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        // dd($input['role_id']);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role_id' => ['required', 'integer', 'max:2'],
            'phone' => ['required', 'max:15', 'unique:users'],
            'alamat'=> ['required' ]
        ])->validate();

        return DB::transaction(function () use ($input) {
            $num = ltrim($input['phone'], '0');
            $number = '62' . $num;
            if ($input['role_id'] == '1') {
                $role = '112';
            } else if ($input['role_id'] == '2') {
                $role = '111';
            }
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role_id' => $role,
                'phone' => $input['phone'],
                'alamat' => $input['alamat'],
                'phone' => intval($number),
            ]), function (User $user) {
                $this->createTeam($user);
                if($user->role_id == '112'){
                    Suppliers::create([
                        'supplier' => $user->name,
                        'user_id' => $user->id,
                    ]);
                }
                if($user->role_id == '111'){
                    Customer::create([
                        'customer' => $user->name,
                        'user_id' => $user->id,
                    ]);
                }
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
