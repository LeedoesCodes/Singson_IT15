<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Post - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-amber-50 font-sans antialiased min-h-screen flex flex-col">

    <header class="bg-gradient-to-r from-amber-500 to-rose-500 shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-white text-2xl font-bold">Edit Post</h1>
                <nav class="space-x-4">
                    <a href="{{ route('home') }}" class="text-white hover:text-amber-100">Home</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-1 container mx-auto px-6 py-12 max-w-2xl">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6">Edit Post</h2>
            
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title', $post->title) }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 @error('title') border-red-500 @enderror"
                           required>
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                    <textarea name="content" 
                              id="content" 
                              rows="5"
                              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 @error('content') border-red-500 @enderror"
                              required>{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Author name --}}
                <div class="mb-4">
                    <label for="author_name" class="block text-gray-700 font-medium mb-2">Author Name</label>
                    <input
                        type="text"
                        name="author_name"
                        id="author_name"
                        placeholder="Your name (or choose Anonymous)"
                        value="{{ old('author_name', $post->author_name) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 @error('author_name') border-red-500 @enderror"
                    >
                    @error('author_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Anonymous checkbox --}}
                <div class="mb-6 flex items-center gap-2">
                    <input
                        id="is_anonymous"
                        type="checkbox"
                        name="is_anonymous"
                        value="1"
                        {{ old('is_anonymous', $post->is_anonymous) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"
                    >
                    <label for="is_anonymous" class="text-gray-700">
                        Post as Anonymous
                    </label>
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('home') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-gradient-to-r from-amber-500 to-rose-500 text-white rounded-lg hover:from-amber-600 hover:to-rose-600 transition">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-gray-800 mt-12">
        <div class="container mx-auto px-6 py-4 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </div>
    </footer>

</body>
</html>