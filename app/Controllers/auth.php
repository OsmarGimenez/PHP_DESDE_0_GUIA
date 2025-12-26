<?php
// app/Controllers/auth.php

// Verificamos si la sesión ya está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexión a Base de Datos
require_once __DIR__ . '/../Includes/db.php';

$accion = $_POST['accion'] ?? '';
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$nombre = trim($_POST['nombre'] ?? '');

// Validación básica (Campos vacíos)
if (!$email || !$password) {
    // CORREGIDO: URL Amigable
    header("Location: login?error=Faltan datos obligatorios");
    exit;
}

if ($accion === 'registro') {
    // Validar nombre en registro
    if (empty($nombre)) {
        // CORREGIDO: URL Amigable + mantenemos el modo registro
        header("Location: login?mode=registro&error=El nombre es obligatorio");
        exit;
    }

    try {
        // 1. Verificar si el email existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            // CORREGIDO: URL Amigable + modo registro
            header("Location: login?mode=registro&error=El email ya está registrado");
            exit;
        }

        // 2. Crear usuario
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $email, $hash]);

        // 3. Auto-login inmediato
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_name'] = $nombre;
        // Asignamos rol por defecto en sesión para evitar errores si la DB lo deja NULL
        $_SESSION['user_rol'] = 'estudiante'; 

        // CORREGIDO: Redirección limpia al inicio
        header("Location: inicio");
        
    } catch (PDOException $e) {
        error_log($e->getMessage());
        // CORREGIDO
        header("Location: login?mode=registro&error=Error al registrar usuario");
    }

} elseif ($accion === 'login') {
    // Lógica de Login
    $stmt = $pdo->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['user_rol'] = $user['rol']; 

        // CORREGIDO: Redirección limpia al inicio
        header("Location: inicio");
    } else {
        // CORREGIDO: Redirección limpia al login con error
        header("Location: login?error=Credenciales incorrectas");
    }

} else {
    // Si llegan aquí sin acción válida
    header("Location: login");
}
?>