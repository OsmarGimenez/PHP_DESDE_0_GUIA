<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titulo) ? $titulo : 'Guía de PHP'; ?> - Guía PHP</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&family=Fira+Code&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link id="prism-theme" rel="stylesheet" href="">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body class="dark-mode">

    <button id="sidebar-toggle-btn" title="Ocultar/Mostrar Menú">☰</button>

    <!-- ZONA DE USUARIO -->
    <div class="user-top-bar">
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Usuario Logueado -->
            <div class="user-dropdown">
                <button class="user-btn">
                    <i class="fas fa-user-circle"></i>
                    <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Usuario'); ?>
                    <i class="fas fa-chevron-down" style="font-size: 0.8em; margin-left: 5px;"></i>
                </button>
                <div class="dropdown-content">
                    <div style="padding: 10px 15px; border-bottom: 1px solid #444; font-size: 0.85em; color: #888;">
                        <?php echo ($_SESSION['user_id'] == 1) ? 'Administrador' : 'Estudiante'; ?>
                    </div>

                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
                        <a href="index.php?p=admin" style="color: var(--color-primary);">
                            <i class="fas fa-tools"></i> Panel Admin
                        </a>
                    <?php endif; ?>

                    <a href="index.php?p=perfil">
                        <i class="fas fa-id-card"></i> Mi Perfil
                    </a>
                    <a href="index.php?p=logout" class="logout-link">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Botones para Visitantes -->
            <a href="index.php?p=login&mode=registro" class="btn-header-outline">Registrarse</a>
            <a href="index.php?p=login" class="btn-header-solid">
                <i class="fas fa-sign-in-alt"></i> Ingresar
            </a>
        <?php endif; ?>
    </div>

    <div class="main-wrapper">