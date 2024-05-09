@extends('layout.main')
@section('content')
<div class="center-both">
    <form action="{{ route('post.update',$post->id)}}" method="post">
      @csrf
      @method('patch')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea name="post_content" class="form-control" id="content" value="{{$post->post_content }}"></textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="text" name="image" class="form-control" id="image" value="{{$post->title}}">
        </div>
        <select class="form-select mb-3" aria-label="Category" name="category_id">
          @foreach($categories as $category)
          <option {{$category->id === $post->category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->title}}</option>
          @endforeach
          
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
        <div>
          <a href="{{route('post.show',$post->id)}}">Back</a>
      </div>
      </form>
  </div>
</div>
@endsection