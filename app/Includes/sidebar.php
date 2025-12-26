<?php // app/Includes/sidebar.php 
$paginaActual = $_GET['p'] ?? 'inicio';

// Aseguramos que la variable exista para evitar errores si no se pasa desde index
if (!isset($temasCompletados)) {
    $temasCompletados = [];
}
?>

<aside class="sidebar">
    <h3 class="sidebar-title">Guía de PHP</h3>

    <div class="theme-switcher">
        <button id="theme-toggle-btn">Cambiar Tema</button>
    </div>

    <div style="padding: 0 20px 20px 20px;">
        <form action="index.php" method="get">
            <input type="hidden" name="p" value="buscar">
            <input type="text" name="q" class="search-box" placeholder="Buscar..." required>
        </form>
    </div>

    <nav>
        <ul class="sidebar-nav">
            <?php if (empty($datosTemas)): ?>
                <li>
                    <p style="padding:10px; color:#f88;">No hay temas disponibles.</p>
                </li>
            <?php else: ?>
                <?php foreach ($datosTemas as $tema): ?>
                    <?php
                    $esActivo = ($paginaActual == $tema['slug']) ? 'active' : '';
                    // Verificamos si este tema está en la lista de completados
                    $estaCompletado = in_array($tema['slug'], $temasCompletados);
                    ?>
                    <li class="<?php echo $esActivo; ?>">
                        <a href="<?php echo $tema['slug']; ?>"
                            style="display: flex; justify-content: space-between; align-items: center;">

                            <span>
                                <?php echo htmlspecialchars($tema['titulo']); ?>
                            </span>

                            <span style="font-size:0.8em;">
                                <?php if ($tema['es_premium']): ?> 💎 <?php endif; ?>
                                <?php if ($estaCompletado): ?> ✅ <?php endif; ?>
                            </span>

                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </nav>
</aside>