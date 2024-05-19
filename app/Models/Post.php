<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\Paginator;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    use Filterable;
    protected $table = 'posts';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


    public function tags(){

        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }







}
