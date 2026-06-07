<section id="portfolio" class="py-20 bg-white dark:bg-slate-900 relative overflow-hidden">
    <!-- Decorative shapes -->
    <div class="absolute top-1/2 left-0 w-64 h-64 bg-primary-50 dark:bg-primary-900/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>

    <div class="max-w-6xl mx-auto px-4 relative">
        <!-- Asymmetric header -->
        <div class="mb-16 flex flex-col md:flex-row md:items-center md:justify-between gap-4" data-aos="fade-up">
            <div>
                <h2 class="font-mono text-4xl md:text-5xl font-bold text-slate-900 dark:text-white">
                    Selected
                    <span class="text-primary-600 dark:text-primary-400">Works</span>
                </h2>
                <div class="w-12 h-1 bg-primary-600 mt-4 transform -rotate-2"></div>
            </div>
            <a href="{{ route('portfolio.index') ?? '#' }}" class="text-sm font-bold text-slate-500 hover:text-primary-600 transition-colors flex items-center gap-2">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <!-- Broken grid cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-6">
            @foreach($featuredProjects as $index => $project)
                @php
                    // Create asymmetric column spans
                    $colSpans = ['lg:col-span-7', 'lg:col-span-5', 'lg:col-span-5', 'lg:col-span-7', 'lg:col-span-6', 'lg:col-span-6'];
                    $offsets = ['', '', 'lg:translate-y-4', 'lg:-translate-y-4', '', 'lg:translate-y-4'];
                    $colSpan = $colSpans[$index % count($colSpans)] ?? 'lg:col-span-6';
                    $offset = $offsets[$index % count($offsets)] ?? '';
                @endphp
                <div class="group {{ $colSpan }} {{ $offset }} bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="h-48 bg-slate-800 dark:bg-slate-900 flex items-center justify-center group-hover:bg-slate-700 dark:group-hover:bg-slate-800 transition-colors relative overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-4xl text-primary-400 font-mono font-bold">{{ strtoupper(substr($project->title, 0, 3)) }}</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-bold text-xl text-slate-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                {{ $project->title }}
                            </h3>
                            @if($project->technologies && count($project->technologies) > 0)
                                <span class="text-xs font-mono py-1 px-2 bg-slate-100 dark:bg-slate-700 rounded text-slate-600 dark:text-slate-300">
                                    {{ $project->technologies[0] }}
                                </span>
                            @endif
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm mb-4 line-clamp-3">
                            {{ $project->description }}
                        </p>
                        <div class="flex flex-wrap gap-1 mb-4">
                            @foreach(($project->technologies ?? []) as $tech)
                                <span class="text-xs px-2 py-1 bg-primary-50 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300 rounded">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="flex gap-4">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-bold text-slate-600 dark:text-slate-300 hover:text-primary-600 dark:hover:text-primary-400">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                                    </svg>
                                    Code
                                </a>
                            @endif
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-sm font-bold text-primary-600 dark:text-primary-400 hover:underline">
                                    Live Demo &rarr;
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
