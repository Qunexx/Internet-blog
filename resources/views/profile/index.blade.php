@extends('layout.main')

@section('content')
    <div class="container">
        <h1>Profile Page</h1>
        @if (auth()->check())
            @php
                $profile = auth()->user()->profile;
            @endphp

            @if ($profile)
                <h2>{{ auth()->user()->name }}'s Profile</h2>
                <p><strong>Birthday:</strong> {{ $profile->birthday }}</p>
                <p><strong>Favorite Quote:</strong> {{ $profile->quote }}</p>
                <p><strong>Bio:</strong> {{ $profile->bio }}</p>
                <p><strong>VK:</strong> {{ $profile->vk }}</p>
                <p><strong>Telegram:</strong> {{ $profile->telegram }}</p>
                <p><strong>GitHub:</strong> {{ $profile->github }}</p>
            @else
                <h2>You are for the first time here, please fill the fields of your profile to be open to the community</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('profile.create') }}" method="POST">
                    @csrf
                    <div class="center-both">
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}">
                    </div>

                    <div class="mb-3">
                        <label for="quote" class="form-label">Favorite Quote</label>
                        <textarea name="quote" id="quote" class="form-control">{{ old('quote') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" class="form-control">{{ old('bio') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="vk" class="form-label">VK</label>
                        <input type="text" name="vk" id="vk" class="form-control" value="{{ old('vk') }}">
                    </div>

                    <div class="mb-3">
                        <label for="telegram" class="form-label">Telegram</label>
                        <input type="text" name="telegram" id="telegram" class="form-control" value="{{ old('telegram') }}">
                    </div>

                    <div class="mb-3">
                        <label for="github" class="form-label">GitHub</label>
                        <input type="text" name="github" id="github" class="form-control" value="{{ old('github') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Create Profile</button>
                    </div>
                </form>
            @endif
        @else
            <p>Dear guest, you are not logged in. Please <a href="/login">login</a> or <a href="/register">register</a> to see your profile.</p>
        @endif
    </div>
@endsection
