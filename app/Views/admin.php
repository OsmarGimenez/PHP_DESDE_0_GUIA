<div class="container">
    <h1>Panel de Administración</h1>
    <p>Crear nuevo contenido para la guía.</p>

    <?php if (isset($_GET['success'])): ?>
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            ✅ ¡Tema creado exitosamente!
        </div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert-error">
            ❌ <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <div class="login-card" style="max-width: 800px; margin: 0 auto;">
        <form action="index.php?p=admin_crear" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label class="form-label">Título del Tema</label>
                <input type="text" name="titulo" class="form-input" placeholder="Ej: 12. Introducción a Laravel" required>
            </div>

            <div class="form-group">
                <label class="form-label">Slug (URL Amigable)</label>
                <input type="text" name="slug" class="form-input" placeholder="Ej: 12.intro_laravel (sin espacios)" required>
                <small style="color: #888;">Este será el nombre del archivo (ej: 12.intro_laravel.php)</small>
            </div>

            <div class="form-group">
                <label class="form-label">Descripción Corta</label>
                <input type="text" name="descripcion" class="form-input" placeholder="Breve resumen para el menú">
            </div>

            <div class="form-group">
                <label class="form-label">Imagen de Portada (Opcional)</label>
                <input type="file" name="imagen" class="form-input" accept="image/*">
                <small style="color: #888;">Formatos: JPG, PNG, GIF. Máx 2MB.</small>
            </div>
            <div style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label class="form-label">Orden (Número)</label>
                    <input type="number" name="orden" class="form-input" placeholder="Ej: 12" required>
                </div>

                <div class="form-group" style="flex: 1;">
                    <label class="form-label">Tipo de Contenido</label>
                    <select name="es_premium" class="form-input">
                        <option value="0">Gratuito</option>
                        <option value="1">Premium 💎</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Contenido Inicial (HTML/PHP)</label>
                <textarea name="contenido" class="form-input" style="height: 200px; font-family: monospace;" required>
<div class="container">
    <h1>Título del Tema</h1>
    <p>Escribe aquí tu contenido...</p>
</div>
                </textarea>
            </div>

            <button type="submit" class="btn-primary">Crear Tema y Archivo</button>
        </form>
    </div>
</div>