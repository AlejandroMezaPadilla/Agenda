<?php
include "clases/crud.php";
$crud = new Crud();

// Mensajes de alerta
$mensaje = '';
if (isset($_GET['success'])) {
    $mensaje = "<div class='alert alert-success'>✅ Contacto guardado/actualizado correctamente.</div>";
} elseif (isset($_GET['error'])) {
    $mensaje = "<div class='alert alert-danger'>❌ Ocurrió un error.</div>";
}

$contactos = $crud->showAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Agenda de Contactos</h1>

    <?= $mensaje ?>

    <div class="mb-3">
        <a href="create.php" class="btn btn-success">➕ Crear Contacto</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $c): ?>
            <tr>
                <td>
                    <?php
                  //  $foto = $crud->getPhoto($c['id']);
                  //  if ($foto) {
                    //    echo "<img src='public/upload/{$foto['nombre']}' width='60' class='rounded'>";
                   // } else {
                    //    echo "No hay foto";
                   // }
                    ?>
                </td>
                <td><?= $c['nombre'] . " " . $c['apellido_paterno'] . " " . $c['apellido_materno'] ?></td>
                <td><?= $c['telefono'] ?></td>
                <td><?= $c['correo'] ?></td>
                <td><?= $c['descripcion'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $c['id'] ?>" class="btn btn-primary btn-sm">✏️ Editar</a>
                    <a href="servidor/destroy.php?id=<?= $c['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este contacto?')">🗑️ Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
