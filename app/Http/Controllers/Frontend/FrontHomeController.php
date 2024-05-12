<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();

        $latestPosts = Post::orderBy('id', 'DESC')
            ->where('status', 1)
            ->take(8)
            ->get();
        return view('Frontend.Partials.home', compact('posts', 'latestPosts'));
    }
}
