<?php
// app/Controllers/progreso.php

// 1. Iniciamos sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Verificar que el usuario esté logueado
if (!isset($_SESSION['user_id'])) {
    // CORREGIDO: URL limpia hacia login
    header("Location: login?error=debes_iniciar_sesion");
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
    // CORREGIDO: URL limpia hacia inicio
    header("Location: inicio");
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
    // CORREGIDO: Redirección directa al slug (ej: /01.etiquetas?completed=1)
    // Nota: Cambiamos '&' por '?' porque ahora es el primer parámetro
    header("Location: " . $slugActual . "?completed=1");
    exit;

} catch (Exception $e) {
    // Si falla algo, lo registramos y volvemos sin romper la página
    error_log("Error al guardar progreso: " . $e->getMessage());
    
    // CORREGIDO: Redirección limpia con error
    header("Location: " . $slugActual . "?error=error_sistema");
    exit;
}
?>