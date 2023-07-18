<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {

        // dd($input);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'surname' => ['required', 'string', 'max:255'],
            'city' => ['string', 'max:255'],
            'phone' => ['string', 'max:255'],
            'user_img' => ['mimes:jpg,jpeg,png,gif', 'max:4096'],
        ])->validateWithBag('updateProfileInformation');

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);

            $path = $user->user_img;

            if (array_key_exists('user_img', $input)) {
              
                if ($user->user_img) {
                    File::deleteDirectory(storage_path("app/public/user/{$user->id}"));
                    File::deleteDirectory(storage_path('app/livewire-tmp'));
                }

                $image = $input['user_img'];
                $image->store("user/{$user->id}/profile_pic", 'public');

                $path = "user/{$user->id}/profile_pic/" . $image->hashName();
            }



            // dd($image->extension());
            // exit;

            $user->forceFill([
                'city' => $input['city'],
                'phone' => $input['phone'],
                'user_img' => $path
            ])->save();
        } else {


            $path = $user->user_img;


            if (array_key_exists('user_img', $input)) {
                
                if ($user->user_img) {
                    File::deleteDirectory(storage_path("app/public/user/{$user->id}"));
                    File::deleteDirectory(storage_path('app/livewire-tmp'));
                }

                $image = $input['user_img'];
                $image->store("user/{$user->id}/profile_pic", 'public');

                $path = "user/{$user->id}/profile_pic/" . $image->hashName();
            }


            // dd($image->extension());
            // exit;

            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'city' => $input['city'],
                'phone' => $input['phone'],
                'user_img' => $path
            ])->save();
        }

        // return redirect()->route('user_profile.index');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
