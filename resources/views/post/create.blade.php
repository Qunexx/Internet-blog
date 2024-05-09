@extends('layout.main')
@section('content')
<div class="center-both">
    <form action="{{ route('post.store') }}" method="post">
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea name="post_content" class="form-control" id="content"></textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="text" name="image" class="form-control" id="image">
        </div>
        <select class="form-select mb-3" aria-label="Category" name="category_id">
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->title}}</option>
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