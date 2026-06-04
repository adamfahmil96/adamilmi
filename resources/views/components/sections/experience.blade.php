<section id="experience" class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="font-mono text-3xl font-bold mb-12 text-center decoration-primary-600 underline decoration-4 underline-offset-8" data-aos="fade-up">
            Experience
        </h2>

        <div class="relative">
            <!-- Timeline line -->
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-slate-200 transform -translate-x-1/2"></div>

            @foreach($experiences as $index => $experience)
                <div class="relative mb-12 {{ $index % 2 === 0 ? 'md:pr-1/2' : 'md:pl-1/2' }}" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <!-- Timeline dot -->
                    <div class="absolute left-4 md:left-1/2 w-4 h-4 bg-primary-600 rounded-full border-4 border-white shadow-sm transform -translate-x-1/2 z-10"></div>

                    <div class="ml-12 md:ml-0 {{ $index % 2 === 0 ? 'md:pr-12' : 'md:pl-12' }}">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <h3 class="font-bold text-xl text-slate-900">{{ $experience->position }}</h3>
                                @if($experience->is_current)
                                    <span class="text-xs font-bold px-2 py-1 bg-emerald-100 text-emerald-700 rounded-full">Current</span>
                                @endif
                            </div>
                            <p class="text-primary-600 font-semibold mb-1">{{ $experience->company }}</p>
                            <p class="text-slate-500 text-sm mb-3">
                                {{ $experience->location }} &bull; {{ $experience->date_range }}
                            </p>
                            <p class="text-slate-600">
                                {{ $experience->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
