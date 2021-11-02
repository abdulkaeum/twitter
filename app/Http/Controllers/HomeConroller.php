<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class HomeConroller extends Controller
{
    public function index()
    {
        return view('home', [
            //'tweets' => auth()->user()->timeline()
            'tweets' => Tweet::where('user_id', 1)->latest()->get()
        ]);
    }
}
