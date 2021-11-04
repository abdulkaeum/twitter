<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweet.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'body' => ['required', 'min:5', 'max:255']
        ]);

        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $attributes['body']
        ]);

        return back()->with('success', 'Your Tweety is out in the open');
    }
}
