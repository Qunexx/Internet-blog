@extends('layout.main')
@section('content')
<div class="center-both">
    <h1>Post creating form</h1>
    <form action="{{ route('post.store') }}" method="post">
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input value="{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="title">
          @error('title')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea value="{{old('post_content')}}" name="post_content" class="form-control" id="content" placeholder="Post_content"></textarea>
          @error('post_content')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input value="{{old('image')}}" type="text" name="image" class="form-control" id="image" placeholder="image">
          @error('image')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>
        <select class="form-select mb-3" aria-label="Category" name="category_id">
          @foreach($categories as $category)
          <option
          {{old('category_id') == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->title}}</option>
          @endforeach

        </select>
        <select class="form-select mb-3" multiple aria-label="tags" name="tags[]">
          @foreach($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->title}}</option>
          @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Create</button>
        <div>
          <a href="{{route('posts.index')}}">Back</a>
      </div>
      </form>
  </div>
</div>
@endsection
