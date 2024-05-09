<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PostTag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
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

    public function store(){

        $data = request()->validate([
            "title"=> "string",
            "post_content"=> "string",
            "image"=> "string",
            "category_id" => "",
            "tags"=>"",
        ]);
        $tags=$data['tags'];
        unset($data['tags']);
        $post=Post::create($data);
        $post->tags()->attach($tags);
        
        return redirect()->route('posts.index');
    }

    public function show(Post $post){
        return view("post.show", compact("post"));


    }   


    public function edit(Post $post){
        $categories = Category::all();
       
        return view("post.edit", compact("post","categories"));


    }


    public function update(Post $post){
        $data = request()->validate([
            "title"=> "string",
            "post_content"=> "string",
            "image"=> "string",
            "category_id" => "",
        ]);
        $post->update($data);
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
