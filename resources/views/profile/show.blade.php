@extends('layout.main')

@section('content')
    <div class="container">
        <h1>Profile Page</h1>

        <h2>{{ $profile->user->name }}'s Profile</h2>
        <p><strong>Birthday:</strong> {{ $profile->birthday }}</p>
        <p><strong>Favorite Quote:</strong> {{ $profile->quote }}</p>
        <p><strong>Bio:</strong> {{ $profile->bio }}</p>
        <p><strong>VK:</strong> {{ $profile->vk }}</p>
        <p><strong>Telegram:</strong> {{ $profile->telegram }}</p>
        <p><strong>GitHub:</strong> {{ $profile->github }}</p>

        @if (!auth()->check())
            <p>Dear guest, you are not logged in. Please <a href="/login">login</a> or <a href="/register">register</a> to see your own profile.</p>
        @endif
    </div>
@endsection
