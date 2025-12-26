<?php
// app/Controllers/progreso.php

// 1. Iniciamos sesión si no está iniciada (por seguridad, aunque index.php ya lo hace)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Verificar que el usuario esté logueado
if (!isset($_SESSION['user_id'])) {
    // Si no está logueado, lo mandamos al login
    header("Location: index.php?p=login&error=debes_iniciar_sesion");
    exit;
}

require_once __DIR__ . '/../Includes/db.php';
require_once __DIR__ . '/../Models/Tema.php';

use App\Models\Tema;

// 3. Recibir datos del formulario (POST)
$slugActual = $_POST['slug'] ?? '';
$userId = $_SESSION['user_id'];

// Validación simple
if (empty($slugActual)) {
    header("Location: index.php?p=inicio");
    exit;
}

try {
    $temaModel = new Tema($pdo);

    // 4. Convertimos el SLUG (texto) a ID (número)
    $temaId = $temaModel->obtenerIdPorSlug($slugActual);

    if ($temaId) {
        // 5. Guardamos el progreso en la base de datos
        $temaModel->marcarComoCompletado($userId, $temaId);
    }

    // 6. Redireccionamos al usuario a la misma página
    // Agregamos ?completed=1 para poder mostrar un mensaje de éxito visualmente
    header("Location: index.php?p=" . $slugActual . "&completed=1");
    exit;

} catch (Exception $e) {
    // Si falla algo, lo registramos y volvemos sin romper la página
    error_log("Error al guardar progreso: " . $e->getMessage());
    header("Location: index.php?p=" . $slugActual . "&error=error_sistema");
    exit;
}
?>