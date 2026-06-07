<section id="experience" class="py-20 bg-slate-50 dark:bg-slate-800 relative overflow-hidden">
    <!-- Decorative shapes -->
    <div class="absolute top-0 right-0 w-56 h-56 bg-primary-100 dark:bg-primary-900/20 rounded-full translate-x-1/3 -translate-y-1/3"></div>

    <div class="max-w-6xl mx-auto px-4 relative">
        <!-- Asymmetric header -->
        <div class="mb-16 flex flex-col md:flex-row md:items-end md:justify-between gap-4" data-aos="fade-up">
            <div>
                <h2 class="font-mono text-4xl md:text-5xl font-bold text-slate-900 dark:text-white">
                    Work
                    <span class="text-primary-600 dark:text-primary-400">Experience</span>
                </h2>
                <div class="w-16 h-1 bg-primary-600 mt-4 transform rotate-1"></div>
            </div>
            <p class="text-slate-500 dark:text-slate-400 max-w-xs text-right font-mono text-sm">
                Perjalanan karir saya dari startup hingga institusi pendidikan.
            </p>
        </div>

        <!-- Asymmetric list layout -->
        <div class="space-y-12">
            @foreach($experiences as $index => $experience)
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-8 items-start" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <!-- Left: Year & Company (30%) -->
                    <div class="md:col-span-4">
                        <div class="sticky top-24">
                            <span class="font-mono text-3xl md:text-4xl font-bold text-slate-200 dark:text-slate-700 block leading-none">
                                {{ $experience->date_range }}
                            </span>
                            <h3 class="font-mono text-lg font-bold text-slate-900 dark:text-white mt-2">
                                {{ $experience->company }}
                            </h3>
                            @if($experience->is_current)
                                <span class="inline-block mt-2 text-xs font-bold px-2 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-full">Current</span>
                            @endif
                        </div>
                    </div>

                    <!-- Right: Description (70%) -->
                    <div class="md:col-span-8">
                        <h4 class="font-bold text-xl text-slate-800 dark:text-slate-200 mb-1">
                            {{ $experience->position }}
                        </h4>
                        <p class="text-sm text-primary-600 dark:text-primary-400 font-mono mb-3">
                            {{ $experience->location }}
                        </p>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ $experience->description }}
                        </p>
                    </div>
                </div>

                <!-- Subtle divider -->
                @if(!$loop->last)
                    <div class="border-b border-slate-200 dark:border-slate-700 opacity-50"></div>
                @endif
            @endforeach
        </div>
    </div>
</section>
