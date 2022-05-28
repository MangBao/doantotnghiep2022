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

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }
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
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $sv = $this->user->all();

        foreach ($sv as $s) {
            if($s->email == $input['email']){
                return redirect()->back()->withErrors(['email' => 'Email đã tồn tại']);
            }
            if($s->user_id == $input['sinhvien_id']){
                return redirect()->back()->withErrors(['user_id' => 'Tên đã tồn tại']);
            }
        }

        return User::create([
            'user_id' => $input['sinhvien_id'],
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'connho' => 0,
            'ngaysinh' => '2000-01-01',
            'diachi' => '',
            'sodienthoai' => '',
            'bomon_id' => null,
            'avatar' => 'default.png',
            'thongbaomail' => 0,
            'role_id' => 4,
        ]);
    }
}
