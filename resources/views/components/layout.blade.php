<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'Adam Fahmil - Software Engineer' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Software Engineer specializing in Python, Django, Laravel, and Next.js at Universitas Sebelas Maret' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Playfair Display', 'serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        primary: {
                            50: '#EEF2FF',
                            100: '#E0E7FF',
                            200: '#C7D2FE',
                            300: '#A5B4FC',
                            400: '#818CF8',
                            500: '#6366F1',
                            600: '#4F46E5',
                            700: '#4338CA',
                            800: '#3730A3',
                            900: '#312E81',
                        },
                        dark: '#0F172A',
                        darkSurface: '#1E293B',
                        darkBorder: '#334155',
                    },
                },
            },
        }
    </script>

    <!-- Dark mode initialization (must be before body renders) -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Selection color */
        ::selection {
            background-color: #4F46E5;
            color: white;
        }

        /* Dark mode styles */
        .dark {
            color-scheme: dark;
        }

        .dark body {
            background-color: #0F172A;
            color: #E2E8F0;
        }

        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Prose styles for blog content */
        .prose {
            max-width: none;
            color: #334155;
        }

        .dark .prose {
            color: #e2e8f0;
        }

        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            font-weight: 700;
            line-height: 1.3;
            margin-top: 1.5em;
            margin-bottom: 0.75em;
            color: #0f172a;
        }

        .dark .prose h1, .dark .prose h2, .dark .prose h3, .dark .prose h4, .dark .prose h5, .dark .prose h6 {
            color: #f1f5f9;
        }

        .prose h1 {
            font-size: 2em;
        }

        .prose h2 {
            font-size: 1.5em;
            margin-top: 2em;
        }

        .prose h3 {
            font-size: 1.25em;
        }

        .prose p {
            margin-bottom: 1.25em;
            line-height: 1.8;
        }

        .prose strong {
            font-weight: 700;
        }

        .prose a {
            color: #4F46E5;
            text-decoration: underline;
        }

        .prose a:hover {
            color: #4338CA;
        }

        .dark .prose a {
            color: #818CF8;
        }

        .dark .prose a:hover {
            color: #A5B4FC;
        }

        .prose code {
            font-size: 0.875em;
            font-weight: 600;
            background-color: #f1f5f9;
            padding: 0.15em 0.3em;
            border-radius: 0.25rem;
        }

        .dark .prose code {
            background-color: #1e293b;
            color: #e2e8f0;
        }

        .prose pre {
            margin: 1.5em 0;
            padding: 1.5em;
            border-radius: 0.5rem;
            background-color: #0f172a;
            color: #e2e8f0;
            overflow-x: auto;
            white-space: pre;
        }

        .prose pre code {
            background-color: transparent;
            padding: 0;
            font-size: 0.875em;
            color: inherit;
        }

        .prose blockquote {
            border-left-width: 4px;
            border-left-color: #4F46E5;
            padding-left: 1.5em;
            font-style: italic;
            color: #64748b;
        }

        .dark .prose blockquote {
            color: #94a3b8;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.5em;
            margin-bottom: 1.25em;
        }

        .prose ol {
            list-style-type: decimal;
            padding-left: 1.5em;
            margin-bottom: 1.25em;
        }

        .prose li {
            margin-bottom: 0.5em;
            line-height: 1.7;
        }

        /* Animation classes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Hover effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200 font-sans antialiased selection:bg-primary-600 selection:text-white">
    {{ $slot }}

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
        });
    </script>

    @stack('scripts')
</body>
</html>
