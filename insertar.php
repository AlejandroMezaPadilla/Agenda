<?php
include "../clases/crud.php";

$crud = new Crud();

$datos = [
    "paterno"     => $_POST["paterno"],
    "materno"     => $_POST["materno"],
    "nombre"      => $_POST["nombre"],
    "telefono"    => $_POST["telefono"],
    "correo"      => $_POST["correo"],
    "descripcion" => $_POST["descripcion"] // ✅ corregido
];

if ($crud->store($datos)) {
    header("Location: ../index.php");
    exit;
} else {
    echo "❌ No se guardó el registro.";
}
?>
