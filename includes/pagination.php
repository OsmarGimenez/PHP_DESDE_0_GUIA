<?php
// includes/pagination.php

$paginaActual = $_GET['p'] ?? '';

// Obtenemos el orden del tema actual
$stmtCurrent = $pdo->prepare("SELECT orden FROM temas WHERE slug = ?");
$stmtCurrent->execute([$paginaActual]);
$ordenActual = $stmtCurrent->fetchColumn();

$paginaAnterior = null;
$paginaSiguiente = null;

if ($ordenActual !== false) {
    // Buscar anterior
    $stmtPrev = $pdo->prepare("SELECT slug FROM temas WHERE orden < ? ORDER BY orden DESC LIMIT 1");
    $stmtPrev->execute([$ordenActual]);
    $paginaAnterior = $stmtPrev->fetchColumn();

    // Buscar siguiente
    $stmtNext = $pdo->prepare("SELECT slug FROM temas WHERE orden > ? ORDER BY orden ASC LIMIT 1");
    $stmtNext->execute([$ordenActual]);
    $paginaSiguiente = $stmtNext->fetchColumn();
}
?>

<nav class="pagination-nav">
    <?php if ($paginaAnterior): ?>
        <a href="<?php echo $paginaAnterior; ?>">← Anterior</a>
    <?php else: ?>
        <span class="disabled">← Anterior</span>
    <?php endif; ?>

    <!-- ENLACE CORREGIDO: Apunta a 00.inicio -->
    <a href="00.inicio">Inicio</a>

    <?php if ($paginaSiguiente): ?>
        <a href="<?php echo $paginaSiguiente; ?>">Siguiente →</a>
    <?php else: ?>
        <span class="disabled">Siguiente →</span>
    <?php endif; ?>
</nav>