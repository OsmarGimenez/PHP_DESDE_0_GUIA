<?php
// setup_admin.php - Ejecutar una vez en el navegador
require_once 'includes/db.php';

$nombre = "Admin Supremo";
$email = "admin@guia.com";
$password = "admin123"; 
$rol = "admin";

$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->fetch()) {
        echo "<h1 style='color:orange'>⚠️ El usuario admin ya existe.</h1>";
    } else {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
        $stmtInsert = $pdo->prepare($sql);
        $stmtInsert->execute([$nombre, $email, $hash, $rol]);
        
        echo "<h1 style='color:green'>✅ Admin creado correctamente</h1>";
        echo "<p>Email: <strong>$email</strong></p>";
        echo "<p>Pass: <strong>$password</strong></p>";
        echo "<a href='index.php?p=login'>Ir al Login</a>";
    }
} catch (PDOException $e) {
    echo "<h1>❌ Error:</h1> " . $e->getMessage();
}
?>