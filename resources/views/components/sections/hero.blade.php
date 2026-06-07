<section id="home" class="min-h-screen flex items-center relative pt-16 bg-white dark:bg-slate-900 overflow-hidden">
    <!-- Decorative background shapes -->
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary-100 dark:bg-primary-900/20 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-20 left-0 w-64 h-64 bg-emerald-100 dark:bg-emerald-900/20 rounded-full blur-3xl opacity-40 translate-y-1/3 -translate-x-1/4"></div>

    <div class="max-w-7xl mx-auto px-4 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-[80vh]">
            <!-- Left content - offset to create asymmetry -->
            <div class="lg:col-span-7 lg:pr-8 relative z-10">
                <!-- Profile image - positioned asymmetrically on mobile -->
                <div class="mb-6 relative inline-block lg:mb-4" data-aos="fade-up">
                    <div class="w-20 h-20 md:w-24 md:h-24 bg-slate-200 dark:bg-slate-700 rounded-2xl overflow-hidden border-4 border-white dark:border-slate-800 shadow-lg transform -rotate-3">
                        @if(isset($profileImage))
                            <img src="{{ $profileImage }}" alt="Adam Fahmil" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-primary-600 flex items-center justify-center text-white text-2xl font-bold font-mono">
                                AF
                            </div>
                        @endif
                    </div>
                    <div class="absolute -bottom-1 -right-1 bg-emerald-500 text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded-full border-2 border-white tracking-wider shadow-sm">
                        Available
                    </div>
                </div>

                <h1 class="font-mono text-5xl md:text-7xl lg:text-8xl font-bold mb-6 tracking-tight leading-[0.9] text-slate-900 dark:text-white" data-aos="fade-up" data-aos-delay="100">
                    Hi, I'm
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-primary-400 block sm:inline">Adam</span>.
                </h1>

                <p class="font-mono text-lg md:text-xl text-slate-600 dark:text-slate-300 mb-8 max-w-xl leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                    {{ $tagline ?? 'Crafting Robust Backend Systems & Scalable Architecture.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-8" data-aos="fade-up" data-aos-delay="300">
                    <a href="#portfolio" class="px-8 py-4 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 dark:hover:bg-primary-500 transition-all hover:shadow-lg transform hover:-translate-y-1 inline-flex items-center gap-2">
                        View Portfolio
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#about" class="px-8 py-4 bg-white dark:bg-slate-800 text-slate-800 dark:text-white border border-slate-200 dark:border-slate-600 font-medium rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-all hover:shadow-lg transform hover:-translate-y-1">
                        About Me
                    </a>
                </div>

                <div class="flex space-x-5" data-aos="fade-up" data-aos-delay="400">
                    <a href="https://github.com/adamfahmil96" target="_blank" rel="noopener noreferrer" class="text-slate-400 dark:text-slate-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="https://linkedin.com/in/adamfahmil" target="_blank" rel="noopener noreferrer" class="text-slate-400 dark:text-slate-500 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right side - overlapping decorative element -->
            <div class="lg:col-span-5 hidden lg:block relative" data-aos="fade-left" data-aos-delay="200">
                <!-- Code block decoration -->
                <div class="relative">
                    <div class="bg-slate-900 dark:bg-slate-800 rounded-2xl p-8 shadow-2xl transform rotate-2 translate-x-4">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <pre class="font-mono text-sm text-emerald-400"><code><span class="text-purple-400">class</span> <span class="text-yellow-300">Developer</span>:
    <span class="text-purple-400">def</span> <span class="text-blue-300">__init__</span>(self):
        self.name = <span class="text-emerald-300">"Adam"</span>
        self.role = <span class="text-emerald-300">"Backend Engineer"</span>
        self.stack = [
            <span class="text-emerald-300">"Python"</span>,
            <span class="text-emerald-300">"Django"</span>,
            <span class="text-emerald-300">"Laravel"</span>
        ]

    <span class="text-purple-400">def</span> <span class="text-blue-300">build</span>(self):
        <span class="text-purple-400">return</span> <span class="text-emerald-300">"Scalable Systems"</span></code></pre>
                    </div>
                    <!-- Floating badge overlapping -->
                    <div class="absolute -bottom-4 -left-8 bg-primary-600 text-white px-4 py-2 rounded-xl shadow-lg transform -rotate-3 font-mono text-sm font-bold">
                        5+ Years Experience
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce" data-aos="fade-up" data-aos-delay="500">
        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>
