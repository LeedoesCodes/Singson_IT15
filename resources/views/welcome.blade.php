<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kamusta dawg? - Welcome</title>

   
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|playfair-display:400,700,900|space-grotesk:400,500,600" rel="stylesheet" />

  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-amber-50 font-sans antialiased min-h-screen flex flex-col">

    <!-- Modern Header with subtle glass effect -->
    <header class="bg-gradient-to-r from-amber-500 via-orange-500 to-rose-500 shadow-lg sticky top-0 z-10 backdrop-blur-sm bg-opacity-95">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center transform rotate-3 hover:rotate-6 transition-transform">
                        <span class="text-white text-xl">🐕</span>
                    </div>
                    <h1 class="text-white text-2xl font-black tracking-tight">kamusta dawg?</h1>
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

    <!-- Main content -->
    <main class="flex-1 container mx-auto px-6 py-12 max-w-4xl">
        
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

        <!-- Hero Section with modern styling -->
        <div class="text-center mb-16 relative">
            <div class="absolute inset-0 flex items-center justify-center -z-10 opacity-10">
                <span class="text-9xl">🐕</span>
            </div>
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-amber-100 to-rose-100 rounded-2xl text-amber-800 text-sm font-semibold mb-6 border border-amber-200 shadow-sm">
                <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                👋 Welcome to the pack
            </div>
            <h1 class="text-6xl md:text-7xl font-black font-['Playfair_Display'] bg-gradient-to-r from-amber-600 via-orange-600 to-rose-600 bg-clip-text text-transparent mb-4 tracking-tight">
                kamusta dawg?
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Where every dawg has a story to tell. <span class="font-semibold text-amber-600">Share yours today!</span>
            </p>
            
            <!-- Stats decoration -->
            <div class="flex justify-center gap-8 mt-8 text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Share thoughts</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <span>Connect</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span>Discuss</span>
                </div>
            </div>
        </div>

        <!-- Create Post Card - Enhanced Design -->
        <div class="mb-12 max-w-2xl mx-auto relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-rose-500 rounded-3xl blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
            <div class="relative bg-white/90 backdrop-blur-sm p-8 rounded-3xl shadow-xl border border-white/20">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-rose-500 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg">
                        ✍️
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-gray-800">Create a New Post</h2>
                        <p class="text-sm text-gray-500">Share what's on your mind, dawg!</p>
                    </div>
                </div>
                
                <form action="{{ route('posts.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Title</label>
                        <input type="text" 
                               name="title" 
                               placeholder="e.g., My thoughts on..." 
                               class="w-full px-5 py-3 border-2 border-gray-100 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 bg-gray-50/50"
                               required>
                    </div>
                    
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Content</label>
                        <textarea name="content" 
                                  placeholder="What's on your mind, dawg?..." 
                                  class="w-full px-5 py-3 border-2 border-gray-100 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 bg-gray-50/50" 
                                  rows="4" 
                                  required></textarea>
                    </div>
                    
                    <!-- Author section with improved design -->
                    <div class="bg-gradient-to-r from-amber-50 to-rose-50 p-5 rounded-xl border border-amber-100">
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <label class="text-sm font-semibold text-gray-700 ml-1">Author Name</label>
                                <input
                                    type="text"
                                    name="author_name"
                                    placeholder="Your name"
                                    value="{{ old('author_name') }}"
                                    class="w-full px-5 py-3 border-2 border-white rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-200 transition-all duration-300 bg-white/50"
                                >
                            </div>

                            <div class="flex items-center gap-3 p-3 bg-white/50 rounded-lg">
                                <div class="relative">
                                    <input
                                        id="is_anonymous"
                                        type="checkbox"
                                        name="is_anonymous"
                                        value="1"
                                        {{ old('is_anonymous') ? 'checked' : '' }}
                                        class="h-5 w-5 rounded border-gray-300 text-amber-600 focus:ring-amber-500 transition-all cursor-pointer"
                                    >
                                </div>
                                <label for="is_anonymous" class="text-gray-700 font-medium cursor-pointer select-none">
                                    Post as Anonymous
                                    <span class="block text-xs text-gray-500">Your identity will be hidden</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Error messages with improved styling -->
                    @if($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg space-y-1">
                            @foreach($errors->all() as $error)
                                <p class="text-red-600 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $error }}
                                </p>
                            @endforeach
                        </div>
                    @endif

                    <button type="submit" 
                            class="w-full px-6 py-4 bg-gradient-to-r from-amber-500 to-rose-500 text-white font-bold rounded-xl hover:from-amber-600 hover:to-rose-600 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl flex items-center justify-center gap-2 text-lg">
                        <span>Publish Post, Dawg!</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Recent Posts Section with improved cards -->
        <div class="space-y-6 max-w-2xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-black text-gray-800 flex items-center gap-3">
                    <span class="w-8 h-8 bg-gradient-to-br from-amber-500 to-rose-500 rounded-lg"></span>
                    Recent Posts
                </h2>
                <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm font-medium">
                    {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}
                </span>
            </div>
            
            @forelse($posts as $post)
                <div class="group bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-500 border border-gray-100 overflow-hidden transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-black text-xl text-gray-800 group-hover:text-amber-600 transition-colors line-clamp-1">
                                {{ $post->title }}
                            </h3>
                            <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('posts.edit', $post) }}" 
                                   class="p-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition-all transform hover:scale-110 shadow-md hover:shadow-lg"
                                   title="Edit post">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this post, dawg?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-all transform hover:scale-110 shadow-md hover:shadow-lg"
                                            title="Delete post">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Author information with improved badges -->
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            @if($post->is_anonymous)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-gray-600 to-gray-700 text-white shadow-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Anonymous Dawg
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-rose-500 text-white shadow-md">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ $post->author_name ?? 'Dawg' }}
                                </span>
                            @endif
                            
                            <span class="flex items-center gap-1 text-xs text-gray-400 bg-gray-50 px-3 py-1.5 rounded-xl">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 leading-relaxed">{{ $post->content }}</p>
                        
                        <!-- Engagement footer -->
                        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-4 text-sm text-gray-400">
                            <button class="flex items-center gap-1 hover:text-amber-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span>Like</span>
                            </button>
                            <button class="flex items-center gap-1 hover:text-amber-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <span>Comment</span>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-white/50 rounded-3xl border-2 border-dashed border-gray-200">
                    <div class="text-7xl mb-4 opacity-30">📝</div>
                    <p class="text-gray-500 text-lg">No posts yet, dawg!</p>
                    <p class="text-gray-400 text-sm mt-2">Be the first to share your thoughts with the pack</p>
                    <button onclick="document.querySelector('input[name=title]').focus()" class="mt-4 px-6 py-2 bg-amber-500 text-white rounded-xl hover:bg-amber-600 transition-colors inline-flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create First Post
                    </button>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Enhanced Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 mt-16 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center">
                            <span class="text-white text-xl">🐕</span>
                        </div>
                        <h3 class="text-2xl font-black">kamusta dawg?</h3>
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
                &copy; {{ date('Y') }} kamusta dawg? All rights reserved, dawg! 🐕
            </div>
        </div>
    </footer>

</body>
</html>