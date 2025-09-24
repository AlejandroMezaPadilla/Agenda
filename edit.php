<?php
include 'clases/crud.php';
$crud = new Crud();
$datos = $crud->show($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Editar Contacto</h1>
    <div class="card shadow-sm p-4 bg-white rounded mx-auto" style="max-width: 600px;">
        <form action="servidor/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $datos['id'] ?>">
            <div class="mb-3">
                <label>Apellido Paterno</label>
                <input type="text" class="form-control" name="apellidopaterno" value="<?= $datos['apellido_paterno'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Apellido Materno</label>
                <input type="text" class="form-control" name="apellidomaterno" value="<?= $datos['apellido_materno'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos['nombre'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $datos['telefono'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos['correo'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3" required><?= $datos['descripcion'] ?></textarea>
            </div>
            <div class="mb-3">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
        </form>
    </div>
    <br>
    <a href="index.php">⬅️ Volver</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
