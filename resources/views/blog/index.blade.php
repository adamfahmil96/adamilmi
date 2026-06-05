<x-layout title="Blog - Adam Fahmil">
    <x-navbar />

    <main class="pt-24 pb-20 bg-white dark:bg-slate-900">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Blog Header -->
            <div class="text-center mb-12">
                <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4 text-slate-900 dark:text-white">Blog</h1>
                <p class="text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">
                    Tulisan tentang pengalaman, pembelajaran, dan pemikiran saya seputar software engineering dan teknologi.
                </p>
            </div>

            <!-- Search & Filter -->
            <div class="mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
                <form action="{{ route('blog.index') }}" method="GET" class="w-full md:w-96">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles..."
                               class="w-full pl-10 pr-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white dark:bg-slate-800 text-slate-900 dark:text-white">
                        <svg class="absolute left-3 top-2.5 h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </form>

                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('blog.index') }}" 
                       class="px-4 py-2 text-sm font-medium rounded-lg {{ !request('category') ? 'bg-primary-600 text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700' }} transition-colors">
                        All
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('blog.category', $cat) }}" 
                           class="px-4 py-2 text-sm font-medium rounded-lg {{ request('category') === $cat->slug ? 'bg-primary-600 text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700' }} transition-colors">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            @if(isset($category))
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Category: {{ $category->name }}</h2>
                    @if($category->description)
                        <p class="text-slate-600 dark:text-slate-300 mt-2">{{ $category->description }}</p>
                    @endif
                </div>
            @endif

            <!-- Posts Grid -->
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 hover:shadow-lg transition-all duration-300 group">
                            @if($post->featured_image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-primary-100 to-primary-200 dark:from-primary-900/30 dark:to-primary-800/30 flex items-center justify-center">
                                    <span class="text-4xl text-primary-600 dark:text-primary-400 font-mono font-bold">{{ strtoupper(substr($post->title, 0, 2)) }}</span>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-xs font-mono text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/30 px-2 py-1 rounded">{{ $post->category->name ?? 'Uncategorized' }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $post->reading_time }} min read</span>
                                </div>
                                <h3 class="font-bold text-lg mb-2 text-slate-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                    <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="text-slate-600 dark:text-slate-300 text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $post->formatted_date }}</span>
                                    <a href="{{ route('blog.show', $post) }}" class="text-sm font-bold text-primary-600 dark:text-primary-400 hover:underline">
                                        Read more &rarr;
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-slate-300 dark:text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-slate-500 dark:text-slate-400 text-lg">Belum ada artikel yang diterbitkan.</p>
                </div>
            @endif
        </div>
    </main>

    <x-footer />
</x-layout>
