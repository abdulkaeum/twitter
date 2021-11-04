<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:7', 'max:20'],
            'username' => ['required', 'min:5', 'max:20', Rule::unique('users', 'username')->ignore($user)],
            'email' => ['required', 'min:5', Rule::unique('users', 'email')->ignore($user)],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user->update($attributes);

        return redirect()->route('profile', $user->username)->with('success', 'Profile updated');
    }
}
