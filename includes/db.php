<?php
// includes/db.php
// Configuración de la Base de Datos
// En producción, estas variables deberían venir de variables de entorno (.env)
$host = 'localhost';
$db   = 'guia_php';
$user = 'root';     // Usuario por defecto de XAMPP
$pass = '';         // Contraseña por defecto de XAMPP (vacía)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanza errores como excepciones
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Devuelve arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa sentencias preparadas reales (Seguridad)
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Si falla, mostramos un mensaje genérico al usuario y guardamos el error real en el log
    error_log($e->getMessage(), 3, 'errors.log'); 
    die("Error crítico de conexión a la base de datos. Intente más tarde.");
}
?>