<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function view()
    {
        return true;
    }


    public function update(User $user, Profile $profile)
    {

        return auth()->user()->id === $profile->user_id;
    }
}
