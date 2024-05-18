@extends('layout.main')
@section('content')
<div class="center-both">
    <h1>Post editing form</h1>
    <form action="{{ route('post.update',$post->id)}}" method="post">
      @csrf
      @method('patch')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" value="{{$post->title}}" placeholder="title">
          @error('title')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea value="{{old('post_content')}}"  name="post_content" class="form-control" id="content" value="{{$post->post_content }}" placeholder="post_content"></textarea>
          @error('post_content')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input value="{{old('image')}}"type="text" name="image" class="form-control" id="image" value="{{$post->image}}" placeholder="image">
          @error('image')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <select class="form-select mb-3" aria-label="Category" name="category_id">
          @foreach($categories as $category)
          <option {{$category->id === $post->category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->title}}</option>
          @endforeach

        </select>

        <select class="form-select mb-3" multiple aria-label="tags" name="tags[]">
          @foreach($tags as $tag)
          <option
          @foreach($post->tags as $postTag )
          {{ $tag -> id === $postTag->id ? 'selected' : ''}}
          @endforeach
          value="{{$tag->id}}">{{$tag->title}}</option>
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
