<?php
    $esEditar = isset($usuario);
?>
<h2><?php echo $esEditar ? "Editar usuario" : "Crear Usuario"; ?></h2>
<a href="index.php">Volver</a>

<form action="index.php?action=crear" method="post">
    <?php if ($esEditar): ?>
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
    <?php endif; ?>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $esEditar ? $usuario['nombre'] : ''; ?>" required>

    <label for="email">email:</label>
    <input type="email" name="email" value="<?php echo $esEditar ? $usuario['email'] : ''; ?>" required>

    <label for="password">Contraseña:</label>
    <input type="text" name="password" value="<?php echo $esEditar ? $usuario['password'] : ''; ?>" required>

    <button type="submit"><?php echo $esEditar ? "Actualizar" : "Guardar"; ?></button>
</form>