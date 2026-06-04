<section id="about" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="font-mono text-3xl font-bold mb-12 text-center decoration-primary-600 underline decoration-4 underline-offset-8" data-aos="fade-up">
            About Me
        </h2>
        <div class="prose prose-lg prose-slate mx-auto text-slate-600" data-aos="fade-up" data-aos-delay="100">
            @if(isset($about))
                {!! $about !!}
            @else
                <p class="mb-6">
                    Halo! Saya Adam, seorang <span class="font-bold text-slate-800">Software Engineer</span> yang berfokus pada pengembangan sistem backend yang robust dan scalable.
                </p>
                <p class="mb-6">
                    Saat ini saya berkarya sebagai <span class="font-bold text-slate-800">Information Systems Designer / Fullstack Developer</span> di <span class="text-primary-600 font-semibold">Universitas Sebelas Maret (UNS)</span>, di mana saya berkontribusi dalam membangun dan memelihara sistem informasi universitas.
                </p>
                <p class="mb-6">
                    Perjalanan karir saya dimulai di dunia startup bersama <span class="font-bold text-slate-800">Takodam</span> sebagai Software Engineer selama lebih dari 4 tahun. Di sana, saya belajar banyak tentang agility dan rapid development.
                </p>
                <p class="mb-6">
                    Ketertarikan teknis saya berpusat pada <span class="font-mono text-sm bg-slate-100 px-1 py-0.5 rounded text-slate-800">Backend Architecture</span>, <span class="font-mono text-sm bg-slate-100 px-1 py-0.5 rounded text-slate-800">API Integration</span>, dan <span class="font-mono text-sm bg-slate-100 px-1 py-0.5 rounded text-slate-800">Enterprise Systems</span>.
                </p>
            @endif
        </div>
    </div>
</section>
