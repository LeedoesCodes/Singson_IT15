<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kamusta dawg? - Welcome</title>

   
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|playfair-display:400,700" rel="stylesheet" />

  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-amber-50 font-sans antialiased min-h-screen flex flex-col">

    
    <header class="bg-gradient-to-r from-amber-500 to-rose-500 shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-white text-2xl font-bold">kamusta dawg?</h1>
                <nav class="space-x-4">
                    <a href="{{ route('home') }}" class="text-white hover:text-amber-100">Home</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-1 container mx-auto px-6 py-12 max-w-4xl">
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold mb-4">
                👋 Welcome to
            </span>
            <h1 class="text-5xl md:text-6xl font-bold font-['Playfair_Display'] text-gray-800 mb-4">
                kamusta dawg?
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Share your thoughts with the world, dawg!
            </p>
        </div>

     
        <div class="mb-8 max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Create a New Post</h2>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <input type="text" 
                           name="title" 
                           placeholder="Post title" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                           required>
                </div>
                <div class="mb-4">
                    <textarea name="content" 
                              placeholder="What's on your mind, dawg?" 
                              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" 
                              rows="3" 
                              required></textarea>
                </div>
                
                {{-- Author name --}}
                <div class="mb-4">
                    <input
                        type="text"
                        name="author_name"
                        placeholder="Your name (or choose Anonymous)"
                        value="{{ old('author_name') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                    >
                    @error('author_name')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Anonymous checkbox --}}
                <div class="mb-4 flex items-center gap-2">
                    <input
                        id="is_anonymous"
                        type="checkbox"
                        name="is_anonymous"
                        value="1"
                        {{ old('is_anonymous') ? 'checked' : '' }}
                        class="h-4 w-4"
                    >
                    <label for="is_anonymous" class="text-gray-700">
                        Post as Anonymous
                    </label>
                </div>

                {{-- Show title/content errors too (optional but recommended) --}}
                @error('title')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
                @error('content')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror

                <button type="submit" 
                        class="px-6 py-2 bg-gradient-to-r from-amber-500 to-rose-500 text-white rounded-lg hover:from-amber-600 hover:to-rose-600 transition">
                    Publish Post, Dawg!
                </button>
            </form>
        </div>

        
        <div class="space-y-4 max-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Recent Posts</h2>
            
            @forelse($posts as $post)
                <div class="p-6 border rounded-lg shadow-md bg-white hover:shadow-lg transition">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-xl text-gray-800">{{ $post->title }}</h3>
                        <div class="flex gap-2">
                            <a href="{{ route('posts.edit', $post) }}" 
                               class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600 transition">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this post, dawg?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    {{-- Author information --}}
                    <div class="flex items-center gap-2 mb-3">
                        @if($post->is_anonymous)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Anonymous Dawg
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ $post->author_name ?? 'Anonymous Dawg' }}
                            </span>
                        @endif
                        
                        <span class="text-xs text-gray-400">
                            • {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>
                    
                    <p class="text-gray-700">{{ $post->content }}</p>
                </div>
            @empty
                <p class="text-gray-500 text-center py-8">No posts yet, dawg! Be the first to share!</p>
            @endforelse
        </div>
    </main>

   
    <footer class="bg-gray-800 mt-12">
        <div class="container mx-auto px-6 py-4 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} kamusta dawg? All rights reserved, dawg!
        </div>
    </footer>

</body>
</html>