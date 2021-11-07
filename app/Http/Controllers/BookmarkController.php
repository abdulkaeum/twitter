<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index(User $user)
    {
        return view('bookmark.index', [
            'tweets' => Tweet::whereIn('id', $user->bookmarks()->pluck('tweet_id'))
                ->withLikes()
                ->latest()
                ->paginate(5)
        ]);
    }

    public function store(Tweet $tweet)
    {
        $action = current_user()->bookmarks()->toggle($tweet);

        return back()->with('success', empty($action['attached']) ? 'Bookmark removed' : 'Bookmarked');
    }
}
