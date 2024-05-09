@extends('layout.main')
@section('content')
<div class="center-both">
    
    <p>Hello! This is posts page</p>
    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary mb-3" > Add post</a>
    </div>

    @foreach($posts as $post)
        <div><a href="{{route('post.show', $post->id)}}">{{$post->id }} {{$post->title}}</a></div>
    @endforeach
</div>
@endsection