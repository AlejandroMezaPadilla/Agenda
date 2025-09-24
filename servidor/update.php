<?php
include "../clases/crud.php";
$crud = new Crud();

$id = $_POST['id'];
$datos = [
    "apellido_paterno" => $_POST["apellidopaterno"],
    "apellido_materno" => $_POST["apellidomaterno"],
    "nombre"           => $_POST["nombre"],
    "telefono"         => $_POST["telefono"],
    "correo"           => $_POST["correo"],
    "descripcion"      => $_POST["descripcion"]
];

if ($crud->update($id, $datos)) {
    // Actualizar foto si se sube
    if (isset($_FILES['foto']) && $_FILES['foto']['name'] != '') {
        $crud->guarda_Photo($_FILES['foto'], $id, $_FILES['foto']['name']);
    }
    header("Location: ../index.php?success=1");
} else {
    header("Location: ../index.php?error=1");
}
exit;
?>
