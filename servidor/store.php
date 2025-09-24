<?php
include "../clases/crud.php";

$crud = new Crud();

$datos = [
    "apellido_paterno" => $_POST["apellidopaterno"],
    "apellido_materno" => $_POST["apellidomaterno"],
    "nombre"           => $_POST["nombre"],
    "telefono"         => $_POST["telefono"],
    "correo"           => $_POST["correo"],
    "descripcion"      => $_POST["descripcion"]
];

$id_contacto = $crud->store($datos);

if ($id_contacto) {
    if (isset($_FILES['foto']) && $_FILES['foto']['name'] != '') {
        $crud->guarda_Photo($_FILES['foto'], $id_contacto, $_FILES['foto']['name']);
    }
    header("Location: ../index.php?success=1");
    exit;
} else {
    header("Location: ../index.php?error=1");
    exit;
}
?>
