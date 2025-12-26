</div> <footer class="main-footer">
    
    <div class="footer-left">
        <?php if (isset($btnPrev) && $btnPrev): ?>
            <a href="<?php echo $btnPrev; ?>" class="footer-nav-btn">
                <i class="fas fa-chevron-left"></i> Anterior
            </a>
        <?php else: ?>
            <div style="width:100px;"></div>
        <?php endif; ?>
    </div>

    <div class="footer-center">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="inicio" class="footer-nav-btn" style="background:var(--color-surface); border-color:var(--color-primary); color:var(--color-primary);">
                <i class="fas fa-home"></i> Inicio
            </a>
        <?php else: ?>
            <div style="font-size:0.9em; color:var(--color-text);">
                <a href="login" style="text-decoration:underline; font-weight:bold; color:var(--color-primary);">Inicia sesión</a> para guardar tu progreso.
            </div>
        <?php endif; ?>
    </div>

    <div class="footer-right">
        <?php if (isset($btnNext) && $btnNext): ?>
            <a href="<?php echo $btnNext; ?>" class="footer-nav-btn">
                Siguiente <i class="fas fa-chevron-right"></i>
            </a>
        <?php else: ?>
             <div style="width:100px;"></div>
        <?php endif; ?>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

<script>
    // 1. TEMA CLARO / OSCURO y CAMBIO DE CSS PRISM
    const toggleThemeBtn = document.getElementById('theme-toggle');
    const iconTheme = toggleThemeBtn.querySelector('i');
    const html = document.documentElement;
    const prismLink = document.getElementById('prism-css'); // Referencia al CSS del código

    // URLs de los temas
    const prismDarkTheme = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css';
    const prismLightTheme = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css';

    // Cargar preferencia inicial
    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        html.classList.add('dark-mode');
        document.body.classList.add('dark-mode');
        iconTheme.classList.remove('fa-moon');
        iconTheme.classList.add('fa-sun');
        if(prismLink) prismLink.href = prismDarkTheme;
    } else {
        if(prismLink) prismLink.href = prismLightTheme;
    }

    toggleThemeBtn.addEventListener('click', () => {
        html.classList.toggle('dark-mode');
        document.body.classList.toggle('dark-mode');
        
        if (html.classList.contains('dark-mode')) {
            // Activar Modo Oscuro
            localStorage.setItem('theme', 'dark');
            document.cookie = "theme=dark; path=/"; // Guardar en cookie para PHP
            iconTheme.classList.remove('fa-moon');
            iconTheme.classList.add('fa-sun');
            if(prismLink) prismLink.href = prismDarkTheme; // Cambiar código a oscuro
        } else {
            // Activar Modo Claro
            localStorage.setItem('theme', 'light');
            document.cookie = "theme=light; path=/"; // Guardar en cookie para PHP
            iconTheme.classList.remove('fa-sun');
            iconTheme.classList.add('fa-moon');
            if(prismLink) prismLink.href = prismLightTheme; // Cambiar código a claro
        }
    });

    // 2. TOGGLE SIDEBAR
    const sidebarBtn = document.getElementById('sidebar-toggle-btn');
    const sidebarIcon = sidebarBtn.querySelector('i');
    
    // Icono inicial
    sidebarIcon.classList.add('fa-chevron-left');

    sidebarBtn.addEventListener('click', () => {
        document.body.classList.toggle('sidebar-collapsed');
        
        if (document.body.classList.contains('sidebar-collapsed')) {
            sidebarIcon.classList.remove('fa-chevron-left');
            sidebarIcon.classList.add('fa-chevron-right');
        } else {
            sidebarIcon.classList.remove('fa-chevron-right');
            sidebarIcon.classList.add('fa-chevron-left');
        }

        if (window.innerWidth <= 768) {
            document.body.classList.toggle('sidebar-active');
        }
    });
</script>

</body>
</html>