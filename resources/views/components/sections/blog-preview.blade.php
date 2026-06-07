<section id="blog" class="py-20 bg-white dark:bg-slate-900 relative overflow-hidden">
    <!-- Decorative shapes -->
    <div class="absolute bottom-0 left-0 w-40 h-40 bg-primary-50 dark:bg-primary-900/10 rounded-full -translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-6xl mx-auto px-4 relative">
        <!-- Asymmetric header -->
        <div class="mb-16" data-aos="fade-up">
            <h2 class="font-mono text-4xl md:text-5xl font-bold text-slate-900 dark:text-white">
                Latest
                <span class="text-primary-600 dark:text-primary-400">Writings</span>
            </h2>
            <div class="w-12 h-1 bg-primary-600 mt-4 transform -rotate-1"></div>
        </div>

        <!-- Blog cards - broken grid -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6" data-aos="fade-up" data-aos-delay="100">
            @foreach($latestPosts as $index => $post)
                @php
                    // Alternating column spans and offsets
                    $colSpans = ['md:col-span-7', 'md:col-span-5', 'md:col-span-5', 'md:col-span-7'];
                    $offsets = ['', 'md:translate-y-8', 'md:-translate-y-4', 'md:translate-y-4'];
                    $colSpan = $colSpans[$index % count($colSpans)] ?? 'md:col-span-6';
                    $offset = $offsets[$index % count($offsets)] ?? '';
                @endphp
                <article class="group {{ $colSpan }} {{ $offset }} bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-xs font-mono text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/30 px-2 py-1 rounded">{{ $post->category->name ?? 'Uncategorized' }}</span>
                            <span class="text-xs text-slate-400">&bull;</span>
                            <span class="text-xs text-slate-500 dark:text-slate-400 font-mono">{{ $post->formatted_date }}</span>
                        </div>
                        <h3 class="font-bold text-lg mb-3 text-slate-800 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors leading-tight">
                            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-3 mb-4">{{ $post->excerpt }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-slate-400 font-mono">{{ $post->reading_time }} min read</span>
                            <a href="{{ route('blog.show', $post) }}" class="text-sm font-bold text-primary-600 dark:text-primary-400 hover:underline flex items-center gap-1">
                                Read
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- View All button - offset -->
        <div class="mt-12 flex justify-end" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center px-8 py-4 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 dark:hover:bg-primary-500 transition-all hover:shadow-lg transform hover:-translate-y-1 gap-2">
                View All Posts
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
