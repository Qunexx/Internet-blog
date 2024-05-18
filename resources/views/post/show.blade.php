@extends('layout.main')
@section('content')
<div class="center-both">

    <div>{{$post->id }} {{$post->title}}</div>
    <div>{{$post->post_content}}</div>
   <div> Likes :{{$post->likes }}     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
           <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
       </svg>    </div>
    @if($post->user)
    <div>Author: <a href="{{route('profile.show',$post->user->id)}}">{{$post->user->name}}</a></div>
    @endif
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
