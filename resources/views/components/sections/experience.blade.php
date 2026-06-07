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

        <!-- Broken grid timeline -->
        <div class="relative">
            <!-- Timeline line - asymmetric position -->
            <div class="absolute left-8 md:left-1/3 top-0 bottom-0 w-0.5 bg-gradient-to-b from-primary-600 via-primary-400 to-slate-200 dark:to-slate-600"></div>

            @foreach($experiences as $index => $experience)
                @php
                    $isLeft = $index % 2 === 0;
                @endphp
                <div class="relative mb-12 {{ $isLeft ? 'md:pr-2/3' : 'md:pl-1/3' }}" data-aos="{{ $isLeft ? 'fade-right' : 'fade-left' }}" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <!-- Timeline dot -->
                    <div class="absolute left-8 md:left-1/3 w-4 h-4 bg-primary-600 rounded-full border-4 border-white dark:border-slate-800 shadow-sm transform -translate-x-1/2 z-10"></div>

                    <div class="ml-16 md:ml-0 {{ $isLeft ? 'md:pr-16 md:mr-auto md:max-w-md' : 'md:pl-16 md:ml-auto md:max-w-md' }}">
                        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-md transition-shadow transform hover:-translate-y-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white">{{ $experience->position }}</h3>
                                @if($experience->is_current)
                                    <span class="text-xs font-bold px-2 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-full">Current</span>
                                @endif
                            </div>
                            <p class="text-primary-600 dark:text-primary-400 font-semibold text-sm mb-1">{{ $experience->company }}</p>
                            <p class="text-slate-500 dark:text-slate-400 text-xs mb-3 font-mono">
                                {{ $experience->location }} &bull; {{ $experience->date_range }}
                            </p>
                            <p class="text-slate-600 dark:text-slate-300 text-sm">
                                {{ $experience->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
