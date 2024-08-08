<?php

class Conexion
{
    private $conexion;

    public function __construct()
    {
        $this->conectar_db();
    }

    public function conectar_db()
    {
        $host = 'localhost';
        $usuario = 'root';
        $contrasena = '';
        $base_de_datos = 'gsnab_db';

        // Crear conexión
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        // Verificar la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }

    public function ejecutar_query($sql)
    {
        if ($this->conexion->query($sql) === TRUE) {
            echo "Query ejecutada exitosamente";
        } else {
            echo "Error ejecutando query: " . $this->conexion->error;
        }
    }

    public function cerrar_conexion()
    {
        $this->conexion->close();
    }
}
