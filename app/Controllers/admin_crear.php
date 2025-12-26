<?php
// app/Controllers/admin_crear.php

if (session_status() === PHP_SESSION_NONE) session_start();

// 1. SEGURIDAD: Solo el ID 1 (Admin) puede entrar aquí
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    header("Location: inicio");
    exit;
}

require_once __DIR__ . '/../Includes/db.php';
require_once __DIR__ . '/../Models/Tema.php';
use App\Models\Tema;

// 2. Recibir datos básicos
$titulo = $_POST['titulo'] ?? '';
$slug = trim($_POST['slug'] ?? '');
$descripcion = $_POST['descripcion'] ?? '';
$orden = $_POST['orden'] ?? 0;
$esPremium = $_POST['es_premium'] ?? 0;
$contenido = $_POST['contenido'] ?? '';

// Validación básica
if (empty($titulo) || empty($slug)) {
    header("Location: admin?error=datos_incompletos");
    exit;
}

// 3. PROCESAMIENTO DE IMAGEN
$nombreImagenGuardada = null; // Por defecto es null

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Definir directorio de destino (Ruta absoluta)
    $directorioDestino = __DIR__ . '/../../public/uploads/';
    
    // Obtener información del archivo
    $nombreArchivo = $_FILES['imagen']['name'];
    $tipoArchivo = $_FILES['imagen']['type'];
    $tmpName = $_FILES['imagen']['tmp_name'];
    
    // Validar extensiones permitidas
    $permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    
    if (in_array($tipoArchivo, $permitidos)) {
        // Generar nombre único para evitar sobrescribir (timestamp_nombre)
        $nuevoNombre = time() . '_' . basename($nombreArchivo);
        $rutaFinal = $directorioDestino . $nuevoNombre;
        
        // Mover el archivo
        if (move_uploaded_file($tmpName, $rutaFinal)) {
            $nombreImagenGuardada = $nuevoNombre;
        } else {
            // Error al mover (permisos, etc.)
            error_log("Error moviendo archivo a: " . $rutaFinal);
            header("Location: admin?error=error_subida_imagen");
            exit;
        }
    } else {
        header("Location: admin?error=formato_no_valido");
        exit;
    }
}

try {
    // 4. Guardar en Base de Datos (Pasamos el nombre de la imagen)
    $temaModel = new Tema($pdo);
    $temaModel->crearTema($titulo, $slug, $descripcion, $orden, $esPremium, $nombreImagenGuardada);

    // 5. CREAR EL ARCHIVO FÍSICO (.php)
    $rutaArchivo = __DIR__ . '/../Views/' . $slug . '.php';

    if (!file_exists($rutaArchivo)) {
        
        // --- INYECCIÓN AUTOMÁTICA DE IMAGEN ---
        // Si subió imagen, insertamos el HTML al principio del contenedor
        $htmlImagen = '';
        if ($nombreImagenGuardada) {
            $htmlImagen = '<div style="text-align:center; margin-bottom:20px;">
                <img src="uploads/'. $nombreImagenGuardada .'" alt="Portada" style="max-width:100%; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.2);">
            </div>';
            
            // Insertamos la imagen justo después de <div class="container">
            // Si no encuentra la etiqueta, la concatena al inicio.
            if (strpos($contenido, '<div class="container">') !== false) {
                $contenido = str_replace('<div class="container">', '<div class="container">' . "\n" . $htmlImagen, $contenido);
            } else {
                $contenido = $htmlImagen . $contenido;
            }
        }
        // --------------------------------------

        file_put_contents($rutaArchivo, $contenido);
    } else {
        header("Location: admin?error=el_archivo_ya_existe");
        exit;
    }

    // Éxito
    header("Location: admin?success=tema_creado");

} catch (Exception $e) {
    error_log($e->getMessage());
    header("Location: admin?error=error_db");
}
?>