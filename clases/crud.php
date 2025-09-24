<?php
include "conexion.php";

class Crud extends Conexion {

    // Insertar contacto
    public function store($datos) {
        $conn = parent::conectar();
        $sql = "INSERT INTO t_contactos 
                (apellido_paterno, apellido_materno, nombre, telefono, correo, descripcion) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssss",
            $datos["apellido_paterno"],
            $datos["apellido_materno"],
            $datos["nombre"],
            $datos["telefono"],
            $datos["correo"],
            $datos["descripcion"]
        );

        if ($stmt->execute()) {
            return $conn->insert_id;
        } else {
            return false;
        }
    }

    // Obtener todos los contactos
    public function showAll() {
        $conn = parent::conectar();
        $sql = "SELECT * FROM t_contactos";
        $result = $conn->query($sql);
        $datos = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
        }
        return $datos;
    }

    // Eliminar contacto
    public function destroy($id) {
        $conn = parent::conectar();
        $sql = "DELETE FROM t_contactos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Obtener un contacto por ID
    public function show($id) {
        $conn = parent::conectar();
        $sql = "SELECT * FROM t_contactos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Actualizar contacto
    public function update($id, $datos) {
        $conn = parent::conectar();
        $sql = "UPDATE t_contactos 
                SET apellido_paterno=?, apellido_materno=?, nombre=?, telefono=?, correo=?, descripcion=? 
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssi",
            $datos["apellido_paterno"],
            $datos["apellido_materno"],
            $datos["nombre"],
            $datos["telefono"],
            $datos["correo"],
            $datos["descripcion"],
            $id
        );
        return $stmt->execute();
    }

    // Guardar foto
    public function guarda_Photo($file, $id_contacto, $nombre) {
        $conn = parent::conectar();

        // Verificar si ya existe foto para este contacto
        $sql_check = "SELECT * FROM t_fotos WHERE id_contacto = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("i", $id_contacto);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($result->num_rows > 0) {
            // Actualizar foto existente
            $sql_update = "UPDATE t_fotos SET nombre=? WHERE id_contacto=?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("si", $nombre, $id_contacto);
            $stmt_update->execute();
        } else {
            // Insertar nueva foto
            $sql_insert = "INSERT INTO t_fotos (id_contacto, nombre) VALUES (?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("is", $id_contacto, $nombre);
            $stmt_insert->execute();
        }

        // Mover archivo al servidor
        $targetDir = __DIR__ . "/../public/upload/";
        $targetFile = $targetDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $file["name"];
        } else {
            return false;
        }
    }

    // Obtener foto de un contacto
 //   public function getPhoto($id_contacto) {
   //     $conn = parent::conectar();
     ///   $sql = "SELECT * FROM t_fotos WHERE id_contacto = ? LIMIT 1";
        //$stmt = $conn->prepare($sql);
    //    $stmt->bind_param("i", $id_contacto);
     //   $stmt->execute();
      //  $result = $stmt->get_result();
     //   return $result->fetch_assoc(); // Devuelve array con la foto o null
   // }
}
?>
