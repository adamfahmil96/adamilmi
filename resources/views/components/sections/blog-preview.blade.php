<section id="blog" class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="font-mono text-3xl font-bold mb-12 text-center decoration-primary-600 underline decoration-4 underline-offset-8" data-aos="fade-up">
            Latest Writings
        </h2>

        <div class="space-y-6" data-aos="fade-up" data-aos-delay="100">
            @foreach($latestPosts as $post)
                <article class="flex flex-col md:flex-row gap-6 items-start md:items-center p-6 bg-white rounded-lg border border-slate-100 hover:shadow-md transition-shadow group">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-mono text-primary-600">{{ $post->category->name ?? 'Uncategorized' }}</span>
                            <span class="text-xs text-slate-400">&bull;</span>
                            <span class="text-xs text-slate-500">{{ $post->formatted_date }}</span>
                            <span class="text-xs text-slate-400">&bull;</span>
                            <span class="text-xs text-slate-500">{{ $post->reading_time }} min read</span>
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-slate-800 group-hover:text-primary-600 cursor-pointer transition-colors">
                            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-slate-500 text-sm line-clamp-2">{{ $post->excerpt }}</p>
                    </div>
                    <div class="shrink-0">
                        <a href="{{ route('blog.show', $post) }}" class="text-sm font-bold text-slate-400 hover:text-primary-600 transition-colors">
                            Read &rarr;
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-all hover:shadow-lg transform hover:-translate-y-1">
                View All Posts
            </a>
        </div>
    </div>
</section>
