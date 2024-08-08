<?php

class Estado
{
    private $id_estado;
    private $nombre_estado;

    // Constructor para inicializar los atributos
    public function __construct($nombre_estado, $id_estado = null)
    {
        $this->id_estado = $id_estado;
        $this->nombre_estado = $nombre_estado;
    }

    // Getters
    public function getIdEstado()
    {
        return $this->id_estado;
    }

    public function getNombreEstado()
    {
        return $this->nombre_estado;
    }

    // Setters
    public function setNombreEstado($nombre_estado)
    {
        $this->nombre_estado = $nombre_estado;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
    {
        $sql = "INSERT INTO estados (nombre_estado) VALUES (?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $this->nombre_estado);

        if ($stmt->execute()) {
            echo "Registro insertado exitosamente";
        } else {
            echo "Error al insertar registro: " . $stmt->error;
        }

        $stmt->close();
    }

    public static function findByName($conexion, $nombre_estado)
    {
        $sql = "SELECT * FROM estado WHERE nombre_estado = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $nombre_estado);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                return new Estado($row['nombre_estado'], $row['id_estado']);
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        $stmt->close();
        return null;
    }
}
