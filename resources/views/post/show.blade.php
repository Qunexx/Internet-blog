@extends('layout.main')

@section('content')
    <div class="center-both">
        <div>{{ $post->id }} {{ $post->title }}</div>
        <div>{{ $post->post_content }}</div>
        <div> Likes: {{ $post->likes }}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>
        </div>
        @if (auth()->check())
            @if ($post->isLikedBy(auth()->user()->id))
                <form action="{{ route('posts.unlike', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link p-0 m-0" style="color: red; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                    </button>
                </form>
            @else
                <form action="{{ route('posts.like', $post) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0" style="color: grey; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="M8 2.748-.717-3.4C5.6-4.992 11.2 2.748 8 6.748-3.8 2.748 5.6 2.748 8 2.748zM4.5 8.5L7.5 12L12 8L8 4L4.5 8.5z"/>
                        </svg>
                    </button>
                </form>
            @endif

        @endif

    @if ($post->user)
            <div>Author: <a href="{{ route('profile.show', $postOwnerProfileId) }}">{{ $post->user->name }}</a></div>
        @endif

        @if (auth()->check() && (auth()->user()->role === 'admin' || ($post->user && auth()->user()->id === $post->user->id)))
            <div>
                <form action="{{ route('post.edit', $post->id) }}" method="get">
                    @csrf
                    <input type="submit" value="Edit" class="btn btn-primary">
                </form>
            </div>
            <div>
                <!-- Button to trigger modal for deletion -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('post.delete', $post->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div>
            <a href="{{ route('posts.index') }}">Back</a>
        </div>
    </div>
@endsection
