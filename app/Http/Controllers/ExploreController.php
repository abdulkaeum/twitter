<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function __invoke()
    {
        return view('explore.index', [
            'users' => User::paginate(10)
        ]);
    }
}
