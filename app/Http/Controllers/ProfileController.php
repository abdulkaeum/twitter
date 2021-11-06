<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->latest()->paginate(5)
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('edit', $user);

        $attributes = $request->validate([
            'name' => ['required', 'min:7', 'max:20'],
            'username' => ['required', 'min:5', 'max:20', Rule::unique('users', 'username')->ignore($user)],
            'email' => ['required', 'min:5', Rule::unique('users', 'email')->ignore($user)],
            'password' => ['required', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', Rule::dimensions()->maxWidth(1230)->maxHeight(510)],
            'description' => ['nullable', 'min:10', 'max:50'],
            'banner' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', Rule::dimensions()->maxWidth(1200)->maxHeight(365)]
        ]);

        $user->update($attributes);

        if($request->file('avatar')){
            !is_null($user->avatar) ? Storage::disk('public')->delete($user->avatar) : false;
            $user->avatar = $request->file('avatar')?->store('avatar');
            $user->save();
        }

        if($request->file('banner')){
            !is_null($user->banner) ? Storage::disk('public')->delete($user->banner) : false;
            $user->banner = $request->file('banner')?->store('banner');
            $user->save();
        }

        return redirect()->route('profile', $user->username)->with('success', 'Profile updated');
    }
}
