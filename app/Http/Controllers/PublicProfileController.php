<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PublicProfileController extends Controller
{
    public function show(User $user)
    {
        // code untuk mengecek query yang dijalankan sudah optimal atau belum
        // DB::listen(function ($query) {
        // // Proses log atau tampilkan query yang dijalankan
        // Log::info($query->sql, [$query->bindings, $query->time]);
        // });
        
        $posts = $user->posts()
            ->with(['user', 'media'])
            ->where('published_at', '<=', now())
            ->withCount('claps')
            ->latest()
            ->paginate();

        return view('profile.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
