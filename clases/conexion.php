<?php

class Conexion {
    public function conectar() {
        $host = "localhost";
        $usuario = "backend";
        $password = "backend2025";
        $baseDatos = "padilla_agenda";

        $conexion = mysqli_connect(
            $host, $usuario, $password, $baseDatos
        );
        return $conexion;
    }
}

$objConexion = new Conexion();
if ($objConexion->conectar()) {

    
 echo "Conexión exitosa";
} else {
 echo "Error de conexión";
}
