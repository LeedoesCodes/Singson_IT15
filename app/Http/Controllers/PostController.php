<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Temporary sample posts
    private $posts = [
        ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first post.'],
        ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the second post.'],
        ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post.'],
    ];

    // Show all posts
    public function index()
    {
        $posts = $this->posts;
        return view('posts.index', compact('posts'));
    }

    // Show single post
    public function show($id)
    {
        $post = collect($this->posts)->firstWhere('id', $id);
        if (!$post) abort(404);
        return view('posts.show', compact('post'));
    }

    // Create new post form
    public function create()
    {
        return view('posts.create');
    }

    // Store post (not functional for now)
    public function store(Request $request)
    {
        return redirect()->route('posts.index')->with('success', 'Post saved (simulated)!');
    }

    // Edit form (not functional for now)
    public function edit($id)
    {
        $post = collect($this->posts)->firstWhere('id', $id);
        if (!$post) abort(404);
        return view('posts.edit', compact('post'));
    }

    // Update post (not functional)
    public function update(Request $request, $id)
    {
        return redirect()->route('posts.index')->with('success', 'Post updated (simulated)!');
    }

    // Delete post (not functional)
    public function destroy($id)
    {
        return redirect()->route('posts.index')->with('success', 'Post deleted (simulated)!');
    }
}