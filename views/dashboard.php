<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?> | <a href="index.php?action=logout">Cerrar sesión</a></h2>

<nav>
        <li><a href="index.php?action=index_usuarios">Ver Usuarios</a></li>
        <li><a href="index.php?action=index_proyectos">Mis Proyectos</a></li>
        <li><a href="index.php?action=index_logs">Ver Logs</a></li>
</nav>
