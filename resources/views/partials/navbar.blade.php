<nav class="py-6 bg-transparent">
    <div class="container max-w-screen-xl mx-auto px-4">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <img src="assets/image/navbar-logo.png" alt="Logo" class="h-10">
            </a>

            <!-- Desktop links -->
            <ul class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <li><a href="/" class="text-gray-700 dark:text-gray-200 hover:text-gray-900">Home</a></li>
                <li><a href="/project" class="text-gray-600 dark:text-gray-300 hover:text-gray-900">Projects</a></li>
                <li><a href="/experience" class="text-gray-600 dark:text-gray-300 hover:text-gray-900">Experience</a></li>
                <li><a href="/education" class="text-gray-600 dark:text-gray-300 hover:text-gray-900">Education</a></li>
                <li><a href="/testimonials" class="text-gray-600 dark:text-gray-300 hover:text-gray-900">Testimonials</a></li>
            </ul>

            <div class="flex items-center space-x-4">
                <!-- Theme toggle (uses data attributes so multiple toggles can be wired) -->
                <button data-theme-toggle type="button" aria-label="Toggle dark mode"
                    class="w-10 h-8 flex items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span data-theme-icon class="text-base">🌙</span>
                </button>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" aria-label="Toggle menu" class="md:hidden w-10 h-8 flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu (hidden by default) -->
        <div id="mobile-menu" class="mt-4 md:hidden hidden">
            <ul class="flex flex-col space-y-3 text-base font-medium">
                <li><a href="/" class="block text-gray-700 dark:text-gray-200">Home</a></li>
                <li><a href="/project" class="block text-gray-600 dark:text-gray-300">Projects</a></li>
                <li><a href="/experience" class="block text-gray-600 dark:text-gray-300">Experience</a></li>
                <li><a href="/education" class="block text-gray-600 dark:text-gray-300">Education</a></li>
                <li><a href="/testimonials" class="block text-gray-600 dark:text-gray-300">Testimonials</a></li>
            </ul>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        (function () {
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');
            if (!btn || !menu) return;
            btn.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });
        })();
    </script>
</nav>
