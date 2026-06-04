<x-layout>
    <x-navbar />

    <x-sections.hero />

    <x-sections.about />

    <x-sections.skills :skills="$skills" />

    <x-sections.portfolio :featuredProjects="$featuredProjects" />

    <x-sections.experience :experiences="$experiences" />

    <x-sections.blog-preview :latestPosts="$latestPosts" />

    <x-sections.contact />

    <x-footer />
</x-layout>
