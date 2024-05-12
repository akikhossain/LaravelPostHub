<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function home(Request $request)
    {
        $postsQuery = Post::query();

        // Apply status filter
        $postsQuery->where('status', 1);

        // Apply keyword search
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $postsQuery->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('short_description', 'like', '%' . $keyword . '%');
                $query->orWhereDate('created_at', $keyword); // Search by date
            });
        }

        // Order posts by descending ID
        $postsQuery->orderBy('id', 'DESC');

        // Get the latest 8 posts
        $latestPosts = $postsQuery->take(8)->get();

        // Get all posts (with applied filters if any)
        $posts = $postsQuery->get();

        return view('Frontend.Partials.home', compact('posts', 'latestPosts'));
    }



    public function singlePost($id)
    {
        $posts = Post::find($id);
        if (!$posts) {
            return redirect()->back();
        }
        $user = User::find($posts->user_id);

        return view('Frontend.post.singlePost', compact('posts', 'user'));
    }
}
