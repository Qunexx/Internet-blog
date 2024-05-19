@extends('layout.main')

@section('content')
    <div class="container">
        <h1>Edit {{auth()->user()->name}}'s Profile page</h1>
        <form action="{{ route('profile.update', $profile->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control"
                       value="{{ old('birthday', $profile->birthday) }}">
            </div>

            <div class="mb-3">
                <label for="quote" class="form-label">Favorite Quote</label>
                <textarea name="quote" id="quote" class="form-control">{{ old('quote', $profile->quote) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control">{{ old('bio', $profile->bio) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="vk" class="form-label">VK</label>
                <input type="text" name="vk" id="vk" class="form-control" value="{{ old('vk', $profile->vk) }}">
            </div>

            <div class="mb-3">
                <label for="telegram" class="form-label">Telegram</label>
                <input type="text" name="telegram" id="telegram" class="form-control"
                       value="{{ old('telegram', $profile->telegram) }}">
            </div>

            <div class="mb-3">
                <label for="github" class="form-label">GitHub</label>
                <input type="text" name="github" id="github" class="form-control"
                       value="{{ old('github', $profile->github) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
        <div>
            <a class="fs-3" href="{{url()->previous() }}">Back</a>
        </div>
    </div>
@endsection
