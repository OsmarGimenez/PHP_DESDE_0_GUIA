<?php

$config = require __DIR__ . '/../Config/config.php'; // Ajusta la ruta según tu estructura
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Si falla, mostramos un mensaje genérico al usuario y guardamos el error real en el log
    error_log($e->getMessage(), 3, 'errors.log'); 
    die("Error crítico de conexión a la base de datos. Intente más tarde.");
}
?>