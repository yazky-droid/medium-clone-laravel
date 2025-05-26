<?php

namespace App\Http\Controllers;

use App\Models\User;

class PublicProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()
            ->with(['user', 'media'])
            ->withCount('claps')
            ->latest()
            ->paginate();

        return view('profile.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
