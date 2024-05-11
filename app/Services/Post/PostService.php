<?php

namespace App\Services\Post;
use App\Models\Post;

class PostService {
    public function store($data){
        $tags=$data['tags'];
        unset($data['tags']);
        $post=Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update($post,$data){
        $tags=$data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->fresh();
        $post->tags()->sync($tags);
    }
}