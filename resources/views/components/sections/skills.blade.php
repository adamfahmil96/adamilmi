<section id="skills" class="py-20 bg-slate-50 dark:bg-slate-800">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="font-mono text-3xl font-bold mb-12 text-center text-slate-900 dark:text-white decoration-primary-600 underline decoration-4 underline-offset-8" data-aos="fade-up">
            Tech Stack
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-4 h-auto md:h-96" data-aos="fade-up" data-aos-delay="100">
            <!-- Expert Block (Span 2 cols, 2 rows) -->
            <div class="md:col-span-2 md:row-span-2 bg-white dark:bg-slate-900 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-32 h-32 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/>
                    </svg>
                </div>
                <h3 class="font-mono text-xl font-bold mb-4 text-primary-600 dark:text-primary-400">Expertise</h3>
                <p class="text-slate-500 dark:text-slate-400 mb-6 text-sm">Bertahun-tahun membangun sistem backend yang handal.</p>
                <div class="space-y-4">
                    @foreach($skills->get('backend', collect()) as $skill)
                        <div class="flex items-center">
                            <span class="w-24 font-bold text-slate-700 dark:text-slate-300">{{ $skill->name }}</span>
                            <div class="flex-1 h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-primary-600 transition-all duration-1000" style="width: {{ $skill->proficiency ?? 90 }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Current Stack Block -->
            <div class="bg-slate-900 dark:bg-slate-950 p-6 rounded-2xl shadow-sm border border-slate-800 dark:border-slate-700 text-white flex flex-col justify-center">
                <h3 class="font-mono text-lg font-bold mb-3 text-primary-400">Current Focus</h3>
                <ul class="space-y-2">
                    @foreach($skills->get('frontend', collect())->take(3) as $skill)
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-primary-500 rounded-full"></span>
                            {{ $skill->name }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Learning Block -->
            <div class="bg-primary-50 dark:bg-primary-900/30 p-6 rounded-2xl shadow-sm border border-primary-100 dark:border-primary-800 flex flex-col justify-center">
                <h3 class="font-mono text-lg font-bold mb-3 text-primary-800 dark:text-primary-300">Learning</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($skills->get('other', collect())->take(4) as $skill)
                        <span class="px-3 py-1 bg-white dark:bg-slate-800 text-primary-700 dark:text-primary-300 text-xs font-bold rounded border border-primary-200 dark:border-primary-700">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- All Skills Grid -->
        <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="200">
            @foreach($skills as $category => $categorySkills)
                <div class="bg-white dark:bg-slate-900 p-4 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
                    <h4 class="font-mono text-sm font-bold text-primary-600 dark:text-primary-400 mb-3 uppercase">{{ ucfirst($category) }}</h4>
                    <div class="flex flex-wrap gap-1">
                        @foreach($categorySkills as $skill)
                            <span class="text-xs px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
