<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create()
    {
        return view('Frontend.post.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {
            $fileName = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);
            }

            $post = new Post();
            $post->title = $request->title;
            $post->short_description = $request->short_description;
            $post->description = $request->description;
            $post->image =  $fileName;
            $post->user_id = auth()->user()->id;
            $post->created_at = Carbon::now();
            $post->save();

            session()->flash('success', 'Post created successfully');
            return response()->json([
                'status' => true,
                'message' => 'Post created successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function list(Request $request)
    {
        $userId = Auth::id();
        $postsSearch = Post::where('user_id', $userId);

        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $postsSearch->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('short_description', 'like', '%' . $keyword . '%');
                $query->orWhereDate('created_at', $keyword);
            });
        }

        $posts =   $postsSearch->get();

        return view('Frontend.post.list', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            session()->flash('error', 'Post not found');
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ]);
        }
        return view('Frontend.post.edit', compact('post'));
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);
        if (!$post) {
            session()->flash('error', 'Post not found');
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ]);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {
            $fileName = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);
            }
            $post->title = $request->title;
            $post->short_description = $request->short_description;
            $post->description = $request->description;
            $post->image =  $fileName;
            $post->user_id = auth()->user()->id;
            $post->created_at = Carbon::now();
            $post->save();

            session()->flash('success', 'Post updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Post updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            session()->flash('error', 'Post not found');
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ]);
        }
        $post->delete();
        session()->flash('success', 'Post deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Post deleted successfully'
        ]);
    }
}
