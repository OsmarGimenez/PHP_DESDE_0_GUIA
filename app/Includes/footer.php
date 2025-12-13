</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    <script>
    // --- Lógica del Botón del Sidebar ---
    const body = document.body;
    const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
    if(sidebarToggleBtn){
        sidebarToggleBtn.addEventListener('click', () => { 
            body.classList.toggle('sidebar-collapsed');
            localStorage.setItem('sidebarState', body.classList.contains('sidebar-collapsed') ? 'collapsed' : 'expanded');
        });
    }

    // --- Lógica del Selector de Tema ---
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const prismLink = document.getElementById('prism-theme');
    const lightThemePrism = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css';
    const darkThemePrism = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css';

    function applyTheme(theme) {
        if (theme === 'dark') { 
            body.classList.add('dark-mode'); 
            if(themeToggleBtn) themeToggleBtn.textContent = 'Tema Claro ☀️'; 
            if(prismLink) prismLink.href = darkThemePrism; 
        } else { 
            body.classList.remove('dark-mode'); 
            if(themeToggleBtn) themeToggleBtn.textContent = 'Tema Oscuro 🌙'; 
            if(prismLink) prismLink.href = lightThemePrism; 
        }
        localStorage.setItem('theme', theme);
    }

    if(themeToggleBtn){
        themeToggleBtn.addEventListener('click', () => applyTheme(body.classList.contains('dark-mode') ? 'light' : 'dark'));
    }

    // --- Carga inicial de estados ---
    function initialize() {
        const savedTheme = localStorage.getItem('theme') || 'dark';
        const sidebarState = localStorage.getItem('sidebarState');
        applyTheme(savedTheme);

        if (sidebarState === 'collapsed') {
            body.classList.add('sidebar-collapsed');
        }
    }

    initialize();
    </script>
</body>
</html>