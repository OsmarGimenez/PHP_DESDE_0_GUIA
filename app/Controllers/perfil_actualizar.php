<?php
// app/Controllers/perfil_actualizar.php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?p=login");
    exit;
}

require_once '../app/Includes/db.php';
require_once '../app/Models/Usuario.php';
use App\Models\Usuario;

$id = $_SESSION['user_id'];
$nombre = trim($_POST['nombre'] ?? '');
$pass = $_POST['password'] ?? '';
$passConfirm = $_POST['password_confirm'] ?? '';

// Validación Nombre
if (empty($nombre)) {
    header("Location: index.php?p=perfil&error=nombre_obligatorio");
    exit;
}

// Validación Password
$passwordFinal = null;
if (!empty($pass)) {
    if ($pass !== $passConfirm) {
        header("Location: index.php?p=perfil&error=contrasenas_no_coinciden");
        exit;
    }
    if (strlen($pass) < 6) {
        header("Location: index.php?p=perfil&error=contrasena_muy_corta");
        exit;
    }
    $passwordFinal = $pass;
}

try {
    $usuarioModel = new Usuario($pdo);
    $usuarioModel->actualizar($id, $nombre, $passwordFinal);
    
    // Actualizamos el nombre en la sesión actual para ver el cambio al instante en el header
    $_SESSION['user_name'] = $nombre;

    header("Location: index.php?p=perfil&success=1");
} catch (Exception $e) {
    header("Location: index.php?p=perfil&error=error_db");
}
?>