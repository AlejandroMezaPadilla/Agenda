<?php
include "../clases/crud.php";

$crud = new Crud();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // seguridad básica

    if ($crud->destroy($id)) {
        header("Location: ../index.php?msg=deleted"); 
        exit();
    } else {
        echo "⚠️ Error al eliminar el contacto.";
    }
} else {
    echo "❌ ID no proporcionado.";
}
