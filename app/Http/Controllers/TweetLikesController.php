<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)
    {
        $tweet->like();

        return back()->with('success', 'Tweet Liked');
    }

    public function update(Tweet $tweet)
    {
        $tweet->dislike();

        return back()->with('success', 'Liked removed');
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->likes()->delete();

        return back()->with('success', 'Like removed');
    }
}
