<?php

class Conexion
{
    public function conectar_db()
    {
        $host = 'localhost';
        $usuario = 'root';
        $contrasena = '';
        $base_de_datos = 'db_excel';

        // Crear conexión
        $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        echo "Conexión exitosa";

        // Cerrar la conexión
        $conexion->close();

    }
}