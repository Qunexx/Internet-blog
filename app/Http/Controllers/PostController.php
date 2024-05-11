<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Models\PostTag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Post\PostService;


class PostController extends Controller
{
    public $postService;
    public function __construct(PostService $postService) {
        $this->postService = $postService;
    }

    public function index(){
        $posts = Post::all();

        // TODO: допилить категории и тэги
        // $category= Category::find(1);
        // $post = Post::find(1);
        // dd($post->tags);
        return view("post.index", compact("posts"));
    }
    
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.create", compact("categories","tags"));
    }

    public function store(StoreRequest $request){

        $data = $request->validated();
        $this->postService->store($data);
        return redirect()->route('posts.index');
    }

    public function show(Post $post){
        return view("post.show", compact("post"));


    }   


    public function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
       
        return view("post.edit", compact("post","categories","tags"));


    }


    public function update(UpdateRequest $request,Post $post){
        $data = $request->validated();
        $this->postService->update($post, $data);
        return redirect()->route('post.show', $post->id);
        

}



public function destroy(Post $post){
    $post->delete();

    //Для восстановления после мягкого удаления
    //$post = Post::withTrashed()->find(1);
    //$post->restore();

    return redirect()->route('posts.index');
}


}
