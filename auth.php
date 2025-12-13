<?php
session_start();
require_once 'includes/db.php';

$accion = $_POST['accion'] ?? '';
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$nombre = trim($_POST['nombre'] ?? ''); // Capturamos el nombre

if (!$email || !$password) {
    header("Location: index.php?p=login&error=Faltan datos obligatorios");
    exit;
}

if ($accion === 'registro') {
    // Validar nombre en registro
    if (empty($nombre)) {
        header("Location: index.php?p=login&error=El nombre es obligatorio");
        exit;
    }

    try {
        // 1. Verificar si el email existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            header("Location: index.php?p=login&error=El email ya está registrado");
            exit;
        }

        // 2. Crear usuario
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $email, $hash]);

        // 3. Auto-login inmediato
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_name'] = $nombre;
        
        header("Location: index.php?p=inicio");

    } catch (PDOException $e) {
        header("Location: index.php?p=login&error=Error al registrar usuario");
    }

} elseif ($accion === 'login') {
    // Lógica de Login (Igual que antes)
    $stmt = $pdo->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        header("Location: index.php?p=inicio");
    } else {
        header("Location: index.php?p=login&error=Credenciales incorrectas");
    }
}
?>