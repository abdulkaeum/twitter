<?php

namespace App\Models;

use App\Followable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
        'description',
        'banner'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/'.$value : '/images/default-avatar.jpg');
    }

    public function getBannerAttribute($value)
    {
        return asset( $value ? 'storage/'.$value : '/images/banner.jpg');
    }

    public function timeline()
    {
        return Tweet::whereIn('user_id', $this->follows()->pluck('users.id'))
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(5);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Tweet::class, 'bookmarks', 'user_id', 'tweet_id');
    }
}
