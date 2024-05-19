@extends('layout.main')

@section('content')
    <div class="container">
        <p>Hello! This is the posts page</p>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex align-items-start">
            @if (auth()->check())
                <div class="mr-5">
                    <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add post</a>
                </div>
            @endif

            <div class="ms-lg-5">
                <form action="{{ route('posts.index') }}" method="GET" class="form-inline">
                    <input type="text" class="form-control mr-2" name="title" placeholder="Title"
                           value="{{ request('title') }}">
                    <select class="form-control mr-2" name="category_id">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>


        @foreach($posts as $post)
            <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }} {{ $post->title }}</a></div>
        @endforeach

        <div class="mt-5">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
