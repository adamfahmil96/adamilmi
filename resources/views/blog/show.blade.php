<x-layout title="{{ $post->meta_title ?? $post->title }} - Adam Fahmil" 
          metaDescription="{{ $post->meta_description ?? $post->excerpt }}">
    <x-navbar />

    <main class="pt-24 pb-20 bg-white dark:bg-slate-900">
        <article class="max-w-4xl mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-slate-500 dark:text-slate-400">
                    <li><a href="{{ route('home') }}" class="hover:text-primary-600 dark:hover:text-primary-400">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-primary-600 dark:hover:text-primary-400">Blog</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-slate-900 dark:text-white">{{ $post->title }}</li>
                </ol>
            </nav>

            <!-- Article Header -->
            <header class="mb-12">
                <div class="flex items-center gap-2 mb-4">
                    <a href="{{ route('blog.category', $post->category) }}" class="text-sm font-mono text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/30 px-3 py-1 rounded-full hover:bg-primary-100 dark:hover:bg-primary-800/30 transition-colors">
                        {{ $post->category->name ?? 'Uncategorized' }}
                    </a>
                    <span class="text-sm text-slate-500 dark:text-slate-400">{{ $post->reading_time }} min read</span>
                </div>

                <h1 class="font-heading text-4xl md:text-5xl font-bold mb-6 text-slate-900 dark:text-white leading-tight">
                    {{ $post->title }}
                </h1>

                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white font-bold">
                        AF
                    </div>
                    <div>
                        <p class="font-medium text-slate-900 dark:text-white">Muhammad Adam Fahmil 'Ilmi</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400">{{ $post->formatted_date }}</p>
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            @if($post->featured_image)
                <div class="mb-12 rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" 
                         class="w-full h-auto">
                </div>
            @endif

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none">
                {!! $post->content !!}
            </div>

            <!-- Share & Navigation -->
            <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-slate-500 dark:text-slate-400">Share this article:</span>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post)) }}&text={{ urlencode($post->title) }}" 
                           target="_blank" rel="noopener noreferrer"
                           class="text-slate-400 dark:text-slate-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post)) }}&title={{ urlencode($post->title) }}" 
                           target="_blank" rel="noopener noreferrer"
                           class="text-slate-400 dark:text-slate-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                    <a href="{{ route('blog.index') }}" class="text-sm font-bold text-primary-600 dark:text-primary-400 hover:underline">
                        &larr; Back to Blog
                    </a>
                </div>
            </div>

            <!-- Related Posts -->
            @if($relatedPosts->count() > 0)
                <div class="mt-16">
                    <h3 class="font-heading text-2xl font-bold mb-8 text-slate-900 dark:text-white">Related Articles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedPosts as $related)
                            <article class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 p-6 hover:shadow-md transition-shadow">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-xs font-mono text-primary-600 dark:text-primary-400">{{ $related->category->name ?? 'Uncategorized' }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $related->reading_time }} min read</span>
                                </div>
                                <h4 class="font-bold text-lg mb-2 text-slate-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    <a href="{{ route('blog.show', $related) }}">{{ $related->title }}</a>
                                </h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm line-clamp-2 mb-4">{{ $related->excerpt }}</p>
                                <a href="{{ route('blog.show', $related) }}" class="text-sm font-bold text-primary-600 dark:text-primary-400 hover:underline">
                                    Read more &rarr;
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </article>
    </main>

    <x-footer />
</x-layout>
