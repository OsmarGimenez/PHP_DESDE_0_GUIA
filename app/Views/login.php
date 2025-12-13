<div class="container">
    <div class="login-card">
        <h2 class="login-title" id="form-title">Iniciar Sesión</h2>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert-error">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form action="index.php?p=auth" method="POST" id="auth-form">
            
            <div class="form-group" id="group-nombre" style="display: none;">
                <label class="form-label">Nombre Completo</label>
                <input type="text" name="nombre" id="input-nombre" class="form-input" placeholder="Tu Nombre">
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" required placeholder="tu@email.com">
            </div>
            
            <div class="form-group">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-input" required placeholder="••••••••">
            </div>

            <button type="submit" name="accion" value="login" class="btn-primary" id="btn-submit">
                Ingresar
            </button>
            
            <div style="text-align: center; margin: 15px 0; border-top: 1px solid var(--color-border); padding-top: 15px;">
                <span id="toggle-text" style="color: var(--color-text); font-size: 0.9em;">¿No tienes cuenta?</span>
                
                <a href="#" id="toggle-btn" style="color: var(--color-primary); font-weight: bold; text-decoration: none; margin-left: 5px;">
                    Regístrate gratis
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    const toggleBtn = document.getElementById('toggle-btn');
    const formTitle = document.getElementById('form-title');
    const btnSubmit = document.getElementById('btn-submit');
    const groupNombre = document.getElementById('group-nombre');
    const inputNombre = document.getElementById('input-nombre');
    const toggleText = document.getElementById('toggle-text');
    
    let isLoginMode = true;

    toggleBtn.addEventListener('click', (e) => {
        e.preventDefault(); 
        isLoginMode = !isLoginMode; 

        if (isLoginMode) {
            // Modo LOGIN
            formTitle.textContent = "Iniciar Sesión";
            btnSubmit.textContent = "Ingresar";
            btnSubmit.value = "login";
            groupNombre.style.display = "none";
            inputNombre.required = false; 
            toggleText.textContent = "¿No tienes cuenta?";
            toggleBtn.textContent = "Regístrate gratis";
        } else {
            // Modo REGISTRO
            formTitle.textContent = "Crear Cuenta Nueva";
            btnSubmit.textContent = "Registrarme";
            btnSubmit.value = "registro";
            groupNombre.style.display = "block";
            inputNombre.required = true; 
            toggleText.textContent = "¿Ya tienes cuenta?";
            toggleBtn.textContent = "Inicia Sesión";
        }
    });
</script>