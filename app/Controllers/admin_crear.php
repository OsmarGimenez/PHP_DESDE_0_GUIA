<?php
// app/Controllers/admin_crear.php

if (session_status() === PHP_SESSION_NONE) session_start();

// 1. SEGURIDAD: Solo el ID 1 (Admin) puede entrar aquí
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    header("Location: index.php?p=inicio&error=acceso_denegado");
    exit;
}

require_once __DIR__ . '/../Includes/db.php';
require_once __DIR__ . '/../Models/Tema.php';
use App\Models\Tema;

// 2. Recibir datos
$titulo = $_POST['titulo'] ?? '';
$slug = trim($_POST['slug'] ?? '');
$descripcion = $_POST['descripcion'] ?? '';
$orden = $_POST['orden'] ?? 0;
$esPremium = $_POST['es_premium'] ?? 0;
$contenido = $_POST['contenido'] ?? '';

// Validación básica
if (empty($titulo) || empty($slug)) {
    header("Location: index.php?p=admin&error=datos_incompletos");
    exit;
}

try {
    // 3. Guardar en Base de Datos
    $temaModel = new Tema($pdo);
    $temaModel->crearTema($titulo, $slug, $descripcion, $orden, $esPremium);

    // 4. CREAR EL ARCHIVO FÍSICO
    // Ruta donde se guardará: app/Views/nombre_del_slug.php
    $rutaArchivo = __DIR__ . '/../Views/' . $slug . '.php';

    // Si el archivo no existe, lo creamos
    if (!file_exists($rutaArchivo)) {
        file_put_contents($rutaArchivo, $contenido);
    } else {
        // Si ya existe, avisamos (o podrías decidir sobrescribirlo)
        header("Location: index.php?p=admin&error=el_archivo_ya_existe");
        exit;
    }

    // Éxito
    header("Location: index.php?p=admin&success=tema_creado");

} catch (Exception $e) {
    error_log($e->getMessage());
    header("Location: index.php?p=admin&error=error_db");
}