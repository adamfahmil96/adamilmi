<section id="skills" class="py-20 bg-slate-50 dark:bg-slate-800 relative overflow-hidden">
    <!-- Decorative shapes -->
    <div class="absolute top-0 left-0 w-48 h-48 bg-primary-100 dark:bg-primary-900/20 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-32 h-32 bg-emerald-100 dark:bg-emerald-900/20 rounded-full translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-6xl mx-auto px-4 relative">
        <!-- Asymmetric header -->
        <div class="mb-16 flex flex-col md:flex-row md:items-end md:justify-between gap-4" data-aos="fade-up">
            <div>
                <h2 class="font-mono text-4xl md:text-5xl font-bold text-slate-900 dark:text-white">
                    Tech
                    <span class="text-primary-600 dark:text-primary-400">Stack</span>
                </h2>
                <div class="w-16 h-1 bg-primary-600 mt-4 transform rotate-1"></div>
            </div>
            <p class="text-slate-500 dark:text-slate-400 max-w-xs text-right font-mono text-sm">
                Bertahun-tahun membangun sistem backend yang handal.
            </p>
        </div>

        <!-- Broken grid layout -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6" data-aos="fade-up" data-aos-delay="100">
            <!-- Expertise block - spans 7 cols, offset -->
            <div class="md:col-span-7 md:row-span-2 bg-white dark:bg-slate-900 p-8 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 relative overflow-hidden group transform md:-translate-y-2">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-32 h-32 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/>
                    </svg>
                </div>
                <h3 class="font-mono text-xl font-bold mb-6 text-primary-600 dark:text-primary-400">Expertise</h3>
                <div class="space-y-5">
                    @foreach($skills->get('backend', collect())->take(5) as $skill)
                        <div class="flex items-center gap-4">
                            <span class="w-20 font-bold text-slate-700 dark:text-slate-300 text-sm">{{ $skill->name }}</span>
                            <div class="flex-1 h-3 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-primary-600 to-primary-400 transition-all duration-1000 rounded-full" style="width: {{ $skill->proficiency ?? 90 }}%"></div>
                            </div>
                            <span class="text-xs font-mono text-slate-400 w-10 text-right">{{ $skill->proficiency ?? 90 }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Current Stack - offset right -->
            <div class="md:col-span-5 bg-slate-900 dark:bg-slate-950 p-6 rounded-2xl shadow-sm border border-slate-800 dark:border-slate-700 text-white transform md:translate-y-4">
                <h3 class="font-mono text-lg font-bold mb-4 text-primary-400">Current Focus</h3>
                <ul class="space-y-3">
                    @foreach($skills->get('backend', collect())->take(3) as $skill)
                        <li class="flex items-center gap-3">
                            <span class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></span>
                            <span class="text-sm">{{ $skill->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Learning block - overlapping -->
            <div class="md:col-span-5 md:col-start-8 bg-primary-50 dark:bg-primary-900/30 p-6 rounded-2xl shadow-sm border border-primary-100 dark:border-primary-800 transform md:-translate-y-6 relative z-10">
                <h3 class="font-mono text-lg font-bold mb-4 text-primary-800 dark:text-primary-300">Learning</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($skills->get('other', collect())->take(4) as $skill)
                        <span class="px-3 py-1.5 bg-white dark:bg-slate-800 text-primary-700 dark:text-primary-300 text-xs font-bold rounded-lg border border-primary-200 dark:border-primary-700">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- All Skills Grid - asymmetric offset -->
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="200">
            @foreach($skills as $category => $categorySkills)
                <div class="bg-white dark:bg-slate-900 p-5 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 transform hover:-translate-y-1 transition-transform {{ $loop->iteration % 2 === 0 ? 'md:translate-y-4' : '' }}">
                    <h4 class="font-mono text-xs font-bold text-primary-600 dark:text-primary-400 mb-3 uppercase tracking-wider">{{ ucfirst($category) }}</h4>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($categorySkills as $skill)
                            <span class="text-xs px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
