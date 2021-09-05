<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'user_id',
        'post_likes',
        'post_dislikes'
    ];



//    public function scopeWithlikes($post_id){
//        $query -> leftJoinSub(
//            'select post_id , sum(liked) as likes , sum(!liked) as dislikes from likes group by posi_id',
//            'likes' ,
//            'likes.post_id' ,
//            'posts.id'
//        );
//    }
//    public function like(){
//        $this->likes()-> updateOrCreate(
//            [
//                'user_id' => auth()->user()->id,
//                'liked' =>true
//            ]
//        );
//    }
//    public function dislike(){
//        $this->likes()->updateOrCreate([
//           'user_id'=>auth()->user()->id,
//           'liked'=>true
//        ]);
//    }
//    public function isLikedBy(){
//        return (bool) auth()->user()->likes
//            -> where('post_id' , $this.id)
//            -> where('liked' , true)
//            -> count();
//    }
//    public function isDislikedBy(){
//        return (bool) auth()->user()->likes
//            -> where('post_id' , $this.id)
//            -> where('liked' , false)
//            -> count();
//    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
