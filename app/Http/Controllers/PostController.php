<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with([
            'user',
            'comments.user',
            'likes'
        ])
            ->latest()
            ->get();

        return view('index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'   => 'required|image|max:2048',
            'caption' => 'nullable|string|max:1000',
        ]);

        // Simpan gambar
        $path = $request->file('image')->store('posts', 'public');

        // Simpan post
        Auth::user()->posts()->create([
            'image_path' => $path,
            'caption'    => $request->input('caption'),
        ]);

        return redirect('/')
            ->with('success', 'Post berhasil dibuat');
    }
}
