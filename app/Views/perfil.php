<?php
// Obtener datos frescos del usuario
require_once '../app/Models/Usuario.php';
use App\Models\Usuario;

$usuarioModel = new Usuario($pdo);
$usuario = $usuarioModel->obtenerPorId($_SESSION['user_id']);
?>

<div class="container">
    <h1>Mi Perfil</h1>
    
    <?php if (isset($_GET['success'])): ?>
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            ✅ Perfil actualizado correctamente.
        </div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert-error">❌ <?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <div class="login-card" style="margin: 0 auto;">
        <form action="index.php?p=perfil_actualizar" method="POST">
            
            <div class="form-group">
                <label class="form-label">Email (No modificable)</label>
                <input type="email" class="form-input" value="<?php echo htmlspecialchars($usuario['email']); ?>" disabled style="background: #eee; color: #666;">
            </div>

            <div class="form-group">
                <label class="form-label">Nombre Completo</label>
                <input type="text" name="nombre" class="form-input" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div>

            <hr style="margin: 20px 0; border: 0; border-top: 1px solid var(--color-border);">
            <p style="font-size: 0.9em; color: #888; margin-bottom: 15px;">Dejar en blanco si no deseas cambiar la contraseña.</p>

            <div class="form-group">
                <label class="form-label">Nueva Contraseña</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••">
            </div>

            <div class="form-group">
                <label class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirm" class="form-input" placeholder="••••••••">
            </div>

            <button type="submit" class="btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>