<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Post - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|playfair-display:400,700,900|space-grotesk:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-amber-50 font-sans antialiased min-h-screen flex flex-col">

    <!-- Modern Header with subtle glass effect (matching welcome page) -->
    <header class="bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500 shadow-lg sticky top-0 z-10 backdrop-blur-sm bg-opacity-95">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center transform rotate-3 hover:rotate-6 transition-transform">
                        <span class="text-white text-xl">✏️</span>
                    </div>
                    <h1 class="text-white text-2xl font-black tracking-tight">Edit Post</h1>
                </div>
                <nav class="space-x-2">
                    <a href="{{ route('home') }}" class="text-white px-4 py-2 rounded-xl hover:bg-white hover:bg-opacity-20 transition-all duration-300 font-medium inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Home</span>
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-1 container mx-auto px-6 py-12 max-w-2xl">
        <!-- Success Message -->
        @if(session('success'))
            <div class="animate-slide-down bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3 shadow-md" role="alert">
                <div class="bg-green-500 rounded-full p-1">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Error Messages -->
        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-5 rounded-2xl mb-8 shadow-md">
                <div class="flex items-center gap-3 mb-3">
                    <div class="bg-red-500 rounded-full p-1">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-red-800">Please fix the following errors:</span>
                </div>
                <ul class="space-y-1 ml-10">
                    @foreach($errors->all() as $error)
                        <li class="text-red-600 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Post Card - Enhanced Design matching welcome page -->
        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-rose-500 rounded-3xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
            <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl border border-white/20 overflow-hidden">
                
                <!-- Decorative header -->
                <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500 px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center transform -rotate-3">
                            <span class="text-white text-3xl">📝</span>
                        </div>
                        <div>
                            <h2 class="text-3xl font-black text-white mb-1">Edit Your Post</h2>
                            <p class="text-amber-100 text-sm">Make your changes below, dawg!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form -->
                <div class="p-8">
                    <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Title Field -->
                        <div class="space-y-2">
                            <label for="title" class="text-sm font-bold text-gray-700 ml-1 flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                Post Title
                            </label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   value="{{ old('title', $post->title) }}"
                                   placeholder="e.g., My updated thoughts on..."
                                   class="w-full px-5 py-3 border-2 border-gray-100 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 bg-gray-50/50 @error('title') border-red-300 bg-red-50 @enderror"
                                   required>
                            @error('title')
                                <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Content Field -->
                        <div class="space-y-2">
                            <label for="content" class="text-sm font-bold text-gray-700 ml-1 flex items-center gap-2">
                                <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                Content
                            </label>
                            <textarea name="content" 
                                      id="content" 
                                      rows="6"
                                      placeholder="What's on your mind, dawg? Write your thoughts here..."
                                      class="w-full px-5 py-3 border-2 border-gray-100 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 bg-gray-50/50 @error('content') border-red-300 bg-red-50 @enderror"
                                      required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <p class="text-red-600 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Author Section - Enhanced Design -->
                        <div class="bg-gradient-to-r from-amber-50 to-rose-50 p-6 rounded-xl border border-amber-100">
                            <div class="flex items-center gap-2 mb-4">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <h3 class="font-bold text-gray-800">Author Information</h3>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- Author Name Input -->
                                <div class="space-y-2">
                                    <label for="author_name" class="text-xs font-semibold text-gray-600 ml-1">Author Name</label>
                                    <input
                                        type="text"
                                        name="author_name"
                                        id="author_name"
                                        placeholder="Your name"
                                        value="{{ old('author_name', $post->author_name) }}"
                                        class="w-full px-5 py-3 border-2 border-white rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 bg-white/50 @error('author_name') border-red-300 bg-red-50 @enderror"
                                    >
                                </div>

                                <!-- Anonymous Checkbox - Enhanced -->
                                <div class="flex items-center gap-3 p-4 bg-white/50 rounded-lg border border-white">
                                    <div class="relative">
                                        <input
                                            id="is_anonymous"
                                            type="checkbox"
                                            name="is_anonymous"
                                            value="1"
                                            {{ old('is_anonymous', $post->is_anonymous) ? 'checked' : '' }}
                                            class="h-5 w-5 rounded border-gray-300 text-amber-600 focus:ring-amber-500 transition-all duration-200 cursor-pointer"
                                        >
                                    </div>
                                    <div>
                                        <label for="is_anonymous" class="text-gray-700 font-medium cursor-pointer select-none">
                                            Post as Anonymous
                                        </label>
                                        <p class="text-xs text-gray-500 mt-0.5">Your identity will be hidden from the public</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions - Enhanced Buttons -->
                        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('home') }}" 
                               class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-300 transform hover:scale-105 active:scale-95 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-amber-500 to-rose-500 text-white font-bold rounded-xl hover:from-amber-600 hover:to-rose-600 transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Card (Optional - shows current post state) -->
        <div class="mt-8 relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="px-3 bg-gradient-to-br from-slate-50 via-white to-amber-50 text-sm text-gray-500">
                    Current Post Preview
                </span>
            </div>
        </div>

        <!-- Mini Preview of Current Post -->
        <div class="mt-4 bg-white/50 backdrop-blur-sm rounded-xl p-4 border border-gray-200">
            <div class="flex items-center gap-3 mb-2">
                @if($post->is_anonymous)
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-gradient-to-r from-gray-600 to-gray-700 text-white">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Anonymous
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold bg-gradient-to-r from-amber-500 to-rose-500 text-white">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ $post->author_name ?? 'Dawg' }}
                    </span>
                @endif
                <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <h4 class="font-bold text-gray-800 mb-1">{{ $post->title }}</h4>
            <p class="text-sm text-gray-600 line-clamp-2">{{ $post->content }}</p>
        </div>
    </main>

    <!-- Enhanced Footer (matching welcome page) -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 mt-16 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center">
                            <span class="text-white text-xl">🐕</span>
                        </div>
                        <h3 class="text-2xl font-black">{{ config('app.name', 'Laravel') }}</h3>
                    </div>
                    <p class="text-gray-400 leading-relaxed">A community where every dawg has a voice. Share your stories, connect with others, and be part of the pack.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-amber-400">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Community</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Guidelines</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-amber-400">Connect</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Twitter</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Discord</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">GitHub</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved, dawg! 🐕
            </div>
        </div>
    </footer>

</body>
</html>