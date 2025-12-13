<?php
// app/includes/db.php

// 1. Definir credenciales (Configuración por defecto de XAMPP)
$host = 'localhost';
$db   = 'guia_php';
$user = 'root';
$pass = '';        // En XAMPP la contraseña suele estar vacía
$charset = 'utf8mb4';

// 2. Definir DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// 3. Opciones de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanzar errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,      // Array asociativo
    PDO::ATTR_EMULATE_PREPARES   => false,                 // Seguridad real
];

try {
    // 4. Intentar Conexión
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Si falla, mostramos mensaje (en producción esto va a un log)
    die("Error crítico de conexión a la base de datos: " . $e->getMessage());
}
?>