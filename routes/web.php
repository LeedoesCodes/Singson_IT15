<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;

Route::get('/', function () {
    $posts = Post::latest()->get();
    return view('welcome', compact('posts'));
})->name('home');

Route::post('/posts', function (Request $request) {

    $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'author_name' => ['nullable', 'string', 'max:100'],
        'is_anonymous' => ['nullable', 'in:1'],
    ]);

    $isAnonymous = $request->input('is_anonymous') === '1';

    if (!$isAnonymous && !$request->filled('author_name')) {
        return back()
            ->withErrors(['author_name' => 'Please enter your name OR check "Anonymous".'])
            ->withInput();
    }

    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'author_name' => $isAnonymous ? null : $request->author_name,
    ]);

    return redirect()
        ->route('home')
        ->with('success', 'Post created successfully!');
})->name('posts.store');

Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', compact('post'));
})->name('posts.edit');

Route::put('/posts/{post}', function (Request $request, Post $post) {

    $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'author_name' => ['nullable', 'string', 'max:100'],
        'is_anonymous' => ['nullable', 'in:1'],
    ]);

    $isAnonymous = $request->input('is_anonymous') === '1';

    if (!$isAnonymous && !$request->filled('author_name')) {
        return back()
            ->withErrors(['author_name' => 'Please enter your name OR check "Anonymous".'])
            ->withInput();
    }

    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'author_name' => $isAnonymous ? null : $request->author_name,
    ]);

    return redirect()
        ->route('home')
        ->with('success', 'Post updated successfully!');
})->name('posts.update');

Route::delete('/posts/{post}', function (Post $post) {
    $post->delete();

    return redirect()
        ->route('home')
        ->with('success', 'Post deleted successfully!');
})->name('posts.destroy');