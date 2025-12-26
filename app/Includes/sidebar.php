<?php 
// app/Includes/sidebar.php
$paginaActual = $_GET['p'] ?? 'inicio';
if (!isset($temasCompletados)) { $temasCompletados = []; }
?>

<aside class="sidebar">
    <div style="padding: 25px 20px 10px;">
        <h4 style="margin:0; font-weight:800; color:var(--color-heading); font-size:1.1rem;">PHP Tutorial</h4>
    </div>

    <nav>
        <ul class="sidebar-nav">
            <?php if (isset($datosTemas) && !empty($datosTemas)): ?>
                <li class="<?php echo ($paginaActual == 'inicio') ? 'active' : ''; ?>">
                    <a href="inicio">Introducción</a>
                </li>

                <?php foreach ($datosTemas as $tema): ?>
                    <?php 
                        $esActivo = ($paginaActual == $tema['slug']) ? 'active' : '';
                        $estaCompletado = in_array($tema['slug'], $temasCompletados);
                    ?>
                    <li class="<?php echo $esActivo; ?>">
                        <a href="<?php echo $tema['slug']; ?>" style="display:flex; justify-content:space-between; align-items:center;">
                            <?php echo htmlspecialchars($tema['titulo']); ?>
                            <?php if ($estaCompletado): ?> 
                                <i class="fas fa-check" style="color:var(--color-primary); font-size:0.8em;"></i>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li style="padding:15px; font-size:0.9em; color:#888;">Cargando temas...</li>
            <?php endif; ?>
        </ul>
    </nav>
</aside>