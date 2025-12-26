<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Keluarga Kami')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .fade-in-section {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Memastikan footer nempel bawah jika konten sedikit */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>

<body class="font-poppins antialiased bg-gray-100 dark:bg-gray-900">

    @include('layouts.masters.navbar')

    <main class="flex-grow w-full">
        @yield('content')
    </main>

    @include('layouts.masters.footer')

    <button id="to-top-button" title="Go To Top"
        class="hidden fixed z-50 bottom-10 right-10 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-secondary text-white text-lg font-semibold transition-all duration-300 hover:bg-primary">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Script Dark Mode
        const toggleButton = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        function setTheme(isDark) {
            if (isDark) {
                document.documentElement.classList.add('dark');
                if (localStorage) localStorage.setItem('color-theme', 'dark');
                if (darkIcon) darkIcon.classList.remove('hidden');
                if (lightIcon) lightIcon.classList.add('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                if (localStorage) localStorage.setItem('color-theme', 'light');
                if (darkIcon) darkIcon.classList.add('hidden');
                if (lightIcon) lightIcon.classList.remove('hidden');
            }
        }

        const isSavedDark = localStorage && localStorage.getItem('color-theme') === 'dark';
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const initialDark = (localStorage && localStorage.getItem('color-theme')) ? isSavedDark : prefersDark;
        setTheme(initialDark);

        if (toggleButton) {
            toggleButton.addEventListener('click', () => {
                const isDark = document.documentElement.classList.contains('dark');
                setTheme(!isDark);
            });
        }

        // Observer & Back to Top Script
        document.addEventListener("DOMContentLoaded", function() {
            const sections = document.querySelectorAll('.fade-in-section');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('is-visible');
                });
            }, {
                threshold: 0.1
            });

            sections.forEach(section => observer.observe(section));

            const toTopButton = document.getElementById("to-top-button");
            window.onscroll = function() {
                if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                    toTopButton.classList.remove("hidden");
                } else {
                    toTopButton.classList.add("hidden");
                }
            };
            toTopButton.onclick = function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };
        });
    </script>

    @stack('scripts')
</body>

</html>
