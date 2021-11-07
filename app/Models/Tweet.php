<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) as likes, sum(!liked) as dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislike()
    {
        return $this->like(false);
    }

    public function like($liked = true)
    {
        $this->likes()->updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['liked' => $liked]
        );
    }

    public function isBookmarked(User $user)
    {
        return (bool) $user->bookmarks()
            ->where('tweet_id', $this->id)
            ->count();
    }
}
