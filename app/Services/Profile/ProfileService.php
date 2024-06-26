<?php

namespace App\Services\Profile;


use App\Models\Profile;
use App\Models\User;

class ProfileService
{
    public function store(array $data)
    {
        $profile = new Profile();
        $profile->user_id = auth()->id();
        $profile->birthday = $data['birthday'] ?? null;
        $profile->quote = $data['quote'] ?? 'The best user of the best site';
        $profile->bio = $data['bio'] ?? null;
        $profile->vk = $data['vk'] ?? null;
        $profile->telegram = $data['telegram'] ?? null;
        $profile->github = $data['github'] ?? null;
        $profile->save();
    }


    public function update($profile, $data)
    {
        $profile->birthday = $data['birthday'] ?? null;
        $profile->quote = $data['quote'] ?? 'The best user of the best site';
        $profile->bio = $data['bio'] ?? null;
        $profile->vk = $data['vk'] ?? null;
        $profile->telegram = $data['telegram'] ?? null;
        $profile->github = $data['github'] ?? null;
        $profile->save();
    }


}
