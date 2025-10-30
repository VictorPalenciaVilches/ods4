<nav class="main-nav">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="/workspace/public/img/logos/ods4logo.png" alt="Logo ODS 4">
            <span>ODS 4 - Educación de Calidad</span>
        </div>
        
        <ul class="nav-menu">
            <li><a href="/workspace/src/dashboard/bienvenido.php">Inicio</a></li>
            <li><a href="/workspace/src/asignaturas/matematicas/index.php">Matemáticas</a></li>
            <li><a href="/workspace/src/asignaturas/biologia/index.php">Biología</a></li>
            <li><a href="/workspace/src/asignaturas/lengua_castellana/index.php">Lengua Castellana</a></li>
            <li><a href="/workspace/src/asignaturas/ciencias_sociales/index.php">Ciencias Sociales</a></li>
            <li><a href="/workspace/src/asignaturas/ingles/index.php">Inglés</a></li>
        </ul>
        
        <div class="nav-user">
            <span>Hola, <?php echo isset($usuario_nombre) ? htmlspecialchars($usuario_nombre) : 'Usuario'; ?></span>
            <a href="/workspace/src/auth/logout.php" class="btn-logout">Cerrar Sesión</a>
        </div>
    </div>
</nav>