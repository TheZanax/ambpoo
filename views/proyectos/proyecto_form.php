<?php
 $esEditar = isset($proyecto); 
 ?>

<h2><?php echo $esEditar ? "Editar Proyecto" : "Crear Proyecto"; ?></h2>

<form action="index.php?action=crear_proyecto" method="post">
    <?php if ($esEditar): ?>
        <input type="hidden" name="id" value="<?php echo $proyecto['id']; ?>">
    <?php endif; ?>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo $esEditar ? $proyecto['titulo'] : ''; ?>" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required><?php echo $esEditar ? $proyecto['descripcion'] : ''; ?></textarea>

    <label for="fecha_entrega">Fecha de entrega:</label>
    <input type="date" name="fecha_entrega" value="<?php echo $esEditar ? $proyecto['fecha_entrega'] : ''; ?>" required>

    <button type="submit"><?php echo $esEditar ? "Actualizar" : "Guardar"; ?></button>
</form>
