<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porto - Tailwind Template</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <!-- Minimal fallback styles for .dark mode to ensure toggle works even if Tailwind was built with media strategy -->
    <style>
        /* Basic page-level colors when .dark is present on the <html> element */
        .dark body { background-color: #0b1220; color: #e6eef8; }
        .dark a { color: #93c5fd; }
        .dark .text-gray-400 { color: #9aa6b2 !important; }
        .dark .bg-white { background-color: #0f1724 !important; }
    /* Particles background container styles */
    #particles-root {
      position: fixed;
      inset: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none; /* allow clicks through */
    }

    /* Ensure page content renders above the particles */
    body > *:not(#particles-root) {
      position: relative;
      z-index: 10;
    }
    </style>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
</head>

<body>
    <div id="particles-root"></div>
    @include('partials.navbar')
    
    @yield('content')
    @include('footer.footer')
    <script>
        feather.replace()
    </script>
    <!-- tsparticles CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.11.1/tsparticles.bundle.min.js" integrity="" crossorigin="anonymous"></script>
    <script>
      (function() {
        const root = document.getElementById('particles-root');
        if (!root || !window.tsParticles) return;

        let particlesInstance = null;

        const defaultConfig = {
          fpsLimit: 60,
          detectRetina: true,
          particles: {
            number: { value: 60, density: { enable: true, area: 800 } },
            color: { value: ['#ffffff', '#93c5fd', '#60a5fa'] },
            shape: { type: 'circle' },
            opacity: { value: 0.6, random: { enable: true, minimumValue: 0.2 } },
            size: { value: { min: 1, max: 4 } },
            links: { enable: true, distance: 120, color: '#94a3b8', opacity: 0.15, width: 1 },
            move: { enable: true, speed: 0.6, direction: 'none', outModes: { default: 'out' } }
          },
          interactivity: {
            events: { onHover: { enable: true, mode: 'repulse' }, onClick: { enable: true, mode: 'push' } },
            modes: { repulse: { distance: 80 }, push: { quantity: 4 } }
          }
        };

        const darkConfigAdjust = {
          particles: {
            color: { value: ['#e6eef8', '#93c5fd', '#60a5fa'] },
            links: { color: '#6b7280', opacity: 0.18 }
          }
        };

        const lightConfigAdjust = {
          particles: {
            color: { value: ['#1f2937', '#0f1724'] },
            links: { color: '#cbd5e1', opacity: 0.08 }
          }
        };

        function merge(a, b) {
          return JSON.parse(JSON.stringify(Object.assign({}, a, b)));
        }

        function initParticles() {
          const isDark = document.documentElement.classList.contains('dark');
          const config = isDark ? merge(defaultConfig, darkConfigAdjust) : merge(defaultConfig, lightConfigAdjust);

          if (particlesInstance) {
            window.tsParticles.load('particles-root', config);
            return;
          }

          window.tsParticles.load('particles-root', config).then(container => {
            particlesInstance = container;
          }).catch(err => console.error('tsparticles init error', err));
        }

        // Init now
        initParticles();

        // Re-init when theme changes so colors match
        window.addEventListener('theme-changed', () => {
          initParticles();
        });

        // Cleanup on unload
        window.addEventListener('beforeunload', () => {
          if (particlesInstance) particlesInstance.destroy();
        });
      })();
    </script>
    <script>
  (function() {
    const storageKey = 'theme';
    const root = document.documentElement;
    const toggles = document.querySelectorAll('[data-theme-toggle]');
    const icons = document.querySelectorAll('[data-theme-icon]');

    function setIcons(isDark) {
      icons.forEach(el => {
        el.textContent = isDark ? '☀️' : '🌙';
      });
    }

    function applyTheme(isDark, save = true) {
      if (isDark) {
        root.classList.add('dark');
        toggles.forEach(t => t.setAttribute('aria-pressed', 'true'));
        setIcons(true);
        if (save) localStorage.setItem(storageKey, 'dark');
      } else {
        root.classList.remove('dark');
        toggles.forEach(t => t.setAttribute('aria-pressed', 'false'));
        setIcons(false);
        if (save) localStorage.setItem(storageKey, 'light');
      }
      // Optionally trigger a window event so React or others can respond
      window.dispatchEvent(new Event('theme-changed'));
    }

    try {
      const saved = localStorage.getItem(storageKey);
      if (saved === 'light') {
        applyTheme(false, false);
      } else {
        applyTheme(true, false); // Default to dark theme
      }
    } catch (e) {
      applyTheme(true, false);
    }

    toggles.forEach(btn => {
      btn.addEventListener('click', () => {
        const isDark = root.classList.contains('dark');
        applyTheme(!isDark, true);
      });
    });
  })();
</script>

</body>

</html>
