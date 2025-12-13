<?php
// includes/sidebar.php
// Este archivo ahora es una VISTA pura. 
// Depende de la variable $datosTemas que viene del index.php

$paginaActual = $_GET['p'] ?? 'inicio';
?>

<aside class="sidebar">
    <h3 class="sidebar-title">Guía de PHP</h3>
    
    <div class="theme-switcher">
        <button id="theme-toggle-btn">Cambiar Tema</button>
    </div>

    <div style="padding: 0 20px 20px 20px;">
        <form action="buscar" method="get">
            <input type="text" name="q" class="search-box" placeholder="Buscar..." required>
        </form>
    </div>

    <nav>
        <ul class="sidebar-nav">
            <?php if (empty($datosTemas)): ?>
                <li><p style="padding:10px; color:#f88;">No hay temas disponibles.</p></li>
            <?php else: ?>
                <?php foreach ($datosTemas as $tema): ?>
                    <li class="<?php echo ($paginaActual == $tema['slug']) ? 'active' : ''; ?>">
                        <a href="<?php echo $tema['slug']; ?>" style="display: flex; justify-content: space-between; align-items: center;">
                            <span><?php echo htmlspecialchars($tema['titulo']); ?></span>
                            
                            <?php if ($tema['es_premium']): ?>
                                <span title="Contenido Premium" style="font-size:0.8em;">💎</span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </nav>
</aside>