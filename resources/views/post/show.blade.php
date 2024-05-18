@extends('layout.main')
@section('content')
<div class="center-both">

    <div>{{$post->id }} {{$post->title}}</div>
    <div>{{$post->post_content}}</div>
    <div>Likes:{{$post->likes }} </div>

    @if (auth()->check())
    <div>
        <form action="{{route('post.edit',$post->id)}}" method="get">
            @csrf
            <input type="submit" value="Edit" class="btn btn-primary">
        </form>
    </div>
    <div>
        <form action="{{route('post.delete',$post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
    @endif
    <div>
        <a href="{{route('posts.index')}}">Back</a>
    </div>
</div>
@endsection
