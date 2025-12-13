<div class="container">
    <h1>Resultados de Búsqueda</h1>
    
    <?php
    // Capturamos el término de búsqueda, limpiando espacios
    $busqueda = trim($_GET['q'] ?? '');

    if (!empty($busqueda)) {
        // Consulta SQL buscando coincidencias en título o descripción
        // Usamos LIKE con comodines % para buscar en cualquier parte del texto
        $sql = "SELECT * FROM temas WHERE titulo LIKE ? OR descripcion LIKE ? ORDER BY orden ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["%$busqueda%", "%$busqueda%"]);
        $resultados = $stmt->fetchAll();
    } else {
        $resultados = [];
    }
    ?>

    <?php if (empty($busqueda)): ?>
        <p>Escribe algo en el cuadro de búsqueda para comenzar.</p>
        
    <?php elseif (count($resultados) > 0): ?>
        <p style="margin-bottom: 20px;">
            Se encontraron <strong><?php echo count($resultados); ?></strong> coincidencias para "<em><?php echo htmlspecialchars($busqueda); ?></em>":
        </p>
        
        <div class="search-results">
            <?php foreach ($resultados as $tema): ?>
                <a href="<?php echo $tema['slug']; ?>" style="display: block; background: rgba(255,255,255,0.05); padding: 15px; margin-bottom: 10px; border-radius: 8px; text-decoration: none; border-left: 4px solid #007acc; transition: transform 0.2s;">
                    <h3 style="margin: 0 0 5px 0; color: #007acc;">
                        <?php echo htmlspecialchars($tema['titulo']); ?>
                        <?php if ($tema['es_premium']): ?> 💎 <?php endif; ?>
                    </h3>
                    <?php if ($tema['descripcion']): ?>
                        <p style="margin: 0; color: #aaa; font-size: 0.9em;"><?php echo htmlspecialchars($tema['descripcion']); ?></p>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <div style="padding: 20px; background: rgba(255, 100, 100, 0.1); border-radius: 8px; text-align: center;">
            <h3>😔 Sin resultados</h3>
            <p>No encontramos ningún tema que coincida con "<?php echo htmlspecialchars($busqueda); ?>".</p>
            <a href="inicio" style="color: #007acc; font-weight: bold;">Volver al inicio</a>
        </div>
    <?php endif; ?>
</div>