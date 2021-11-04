<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:7', 'max:20'],
            'username' => ['required', 'min:5', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'min:5', Rule::unique('users','email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect()->route('home')->with('success' ,'Sign up success');
    }
}
