@extends('layout.main')

@section('content')
    <div class="container">
        <h1>Welcome to your Profile Page</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    @if (auth()->check())

            @if ($profile)
                <h2>{{ auth()->user()->name }}'s Profile</h2>
                <p><strong>Birthday:</strong> {{ $profile->birthday }}</p>
                <p><strong>Favorite Quote:</strong> {{ $profile->quote }}</p>
                <p><strong>Bio:</strong> {{ $profile->bio }}</p>
                <p><strong>VK:</strong> {{ $profile->vk }}</p>
                <p><strong>Telegram:</strong> {{ $profile->telegram }}</p>
                <p><strong>GitHub:</strong> {{ $profile->github }}</p>

                <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary btn-sm">Edit Profile</a>

                <h3 class="mt-3">Your posts:</h3>
                @if($posts->isEmpty())
                    <a href="{{route('post.create')}}"> You don't have any post's yet, but you can change it! Make your first!(click on the link) </a>

                @else
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        {{$post->likes}}<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>
                                        <p class="card-text">{{ Str::limit($post->content, 6) }}</p>
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>

                @endif

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
