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

        <h3>{{ $profile->user->name }} posts:</h3>
        @if($profile->user->posts->count()===0)
            <a> {{$profile->user->name}} don't have any post's yet</a>
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

        @if (!auth()->check())
            <p>Dear guest, you are not logged in. Please <a href="/login">login</a> or <a href="/register">register</a> to see your own profile.</p>
        @endif
    </div>
@endsection
