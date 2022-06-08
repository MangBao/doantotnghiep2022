<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        unset($user->route_name);
        unset($user->route_active);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validate();

        if($input['avatar']){
            $avatar = $input['avatar'];
            $avatar_name = $avatar->getClientOriginalName();
            Storage::disk('public')->putFileAs('images', $avatar, $avatar_name);
        }
        else{
            $avatar_name = $user->avatar;
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'ngaysinh' => $input['ngaysinh'],
                'diachi' => $input['diachi'],
                'sodienthoai' => $input['sodienthoai'],
                'avatar' => $avatar_name,
            ])->save();
            if($user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'ngaysinh' => $input['ngaysinh'],
                'diachi' => $input['diachi'],
                'sodienthoai' => $input['sodienthoai'],
                'avatar' => $avatar_name,
            ])->save()){
                session()->flash('success', 'Cập nhật thành công');
            } else {
                session()->flash('error', 'Cập nhật thất bại');
            }
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'ngaysinh' => $input['ngaysinh'],
            'diachi' => $input['diachi'],
            'sodienthoai' => $input['sodienthoai'],
            'avatar' => $avatar_name,
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
