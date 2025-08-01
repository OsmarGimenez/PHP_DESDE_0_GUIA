</div> <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script>
    // --- Lógica del Botón del Sidebar ---
    const body = document.body;
    const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
    sidebarToggleBtn.addEventListener('click', () => { 
        body.classList.toggle('sidebar-collapsed');
        localStorage.setItem('sidebarState', body.classList.contains('sidebar-collapsed') ? 'collapsed' : 'expanded');
    });

    // --- Lógica del Selector de Tema ---
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const prismLink = document.getElementById('prism-theme');
    const lightThemePrism = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css';
    const darkThemePrism = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css';

    function applyTheme(theme) {
        if (theme === 'dark') { body.classList.add('dark-mode'); themeToggleBtn.textContent = 'Tema Claro ☀️'; prismLink.href = darkThemePrism; } 
        else { body.classList.remove('dark-mode'); themeToggleBtn.textContent = 'Tema Oscuro 🌙'; prismLink.href = lightThemePrism; }
        localStorage.setItem('theme', theme);
    }
    themeToggleBtn.addEventListener('click', () => applyTheme(body.classList.contains('dark-mode') ? 'light' : 'dark'));

    // --- Carga inicial de estados ---
    function initialize() {
        // Carga el tema y el estado del sidebar guardados
        const savedTheme = localStorage.getItem('theme') || 'dark';
        const sidebarState = localStorage.getItem('sidebarState');
        applyTheme(savedTheme);

        if (sidebarState === 'collapsed') {
            body.classList.add('sidebar-collapsed');
        }

        // Carga los scripts de Prism DESPUÉS de establecer el tema
        const coreScript = document.createElement('script');
        coreScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js';
        document.body.appendChild(coreScript);

        coreScript.onload = function() {
            const autoloaderScript = document.createElement('script');
            autoloaderScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js';
            document.body.appendChild(autoloaderScript);
        }
    }

    initialize();
</script>
</body>
</html>