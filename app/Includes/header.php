<?php
// Lógica para definir el tema del código según la cookie o preferencia
$themeCookie = $_COOKIE['theme'] ?? 'light';
$prismHref = ($themeCookie === 'dark')
    ? 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css'
    : 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titulo) ? $titulo : 'Guía de PHP'; ?> - PHP Learn</title>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;600;800&family=Fira+Code&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">

    <link id="prism-css" rel="stylesheet" href="<?php echo $prismHref; ?>">

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark-mode');
        } else {
            document.documentElement.classList.remove('dark-mode');
        }
    </script>
</head>

<body class="<?php echo (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') ? 'dark-mode' : ''; ?>">

    <header class="w3-header">
        <div class="header-left">
            <button id="sidebar-toggle-btn" style="background:none; border:none; color:var(--color-text); font-size:20px; cursor:pointer;" title="Menú"><i class="fas fa-bars"></i></button>
            <a href="inicio" class="logo" style="display: flex; align-items: center; text-decoration: none;">
                <span style="color: var(--primary); font-weight: 900;">PHP</span>
                <span style="color: var(--text-main);">LEARN</span>
            </a>

            <nav class="top-menu">
                <a href="inicio" class="active">Tutorials</a>
                <a href="#">References</a>
                <a href="#">Exercises</a>
                <a href="#" style="color:#f1c40f;">Certificates 🏅</a>
            </nav>
        </div>

        <div class="header-right">
            <form action="inicio" method="get" class="top-search-form">
                <input type="hidden" name="p" value="buscar">
                <div class="search-wrapper">
                    <input type="text" name="q" placeholder="Buscar..." required>
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <button id="theme-toggle" class="theme-toggle-btn" title="Cambiar Tema">
                <i class="fas fa-moon"></i>
            </button>

            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-dropdown">
                    <button class="user-btn-round">
                        <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
                    </button>
                    <div class="dropdown-content">
                        <div class="dropdown-header">
                            Hola, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>
                        </div>
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
                            <a href="admin"><i class="fas fa-cogs"></i> Panel Admin</a>
                        <?php endif; ?>
                        <a href="perfil"><i class="fas fa-user"></i> Mi Perfil</a>
                        <a href="logout" class="logout-link"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login" style="font-weight:bold; margin-right:10px;">Log in</a>
                <a href="login?mode=registro" class="btn-primary" style="padding: 8px 20px; font-size:14px;">Sign Up</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="main-wrapper">