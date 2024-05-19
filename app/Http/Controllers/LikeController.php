<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
     public function like(Post $post)
{
    $user = Auth::user();

    DB::transaction(function () use ($post, $user) {
        if (!$post->isLikedBy($user)) {
            $post->likes()->create([
                'user_id' => $user->id,
            ]);

            // Увеличиваем количество лайков в таблице posts
            $post->increment('likes');
        }
    });

    return back();
}

    public function unlike(Post $post)
    {
        $user = Auth::user();

        DB::transaction(function () use ($post, $user) {
            if ($post->isLikedBy($user)) {
                $post->likes()->where('user_id', $user->id)->delete();

                // Уменьшаем количество лайков в таблице posts
                $post->decrement('likes');
            }
        });

        return back();
    }
}
