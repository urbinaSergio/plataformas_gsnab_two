<?php

class PlataformaFathomReads
{
    private $id_plataforma_FATHOM_READS;
    private $user_FATHOM_READS;
    private $password_FATHOM_READS;

    // Constructor para inicializar los atributos
    public function __construct($user_FATHOM_READS, $password_FATHOM_READS, $id_plataforma_FATHOM_READS = null)
    {
        $this->id_plataforma_FATHOM_READS = $id_plataforma_FATHOM_READS;
        $this->user_FATHOM_READS = $user_FATHOM_READS;
        $this->password_FATHOM_READS = $password_FATHOM_READS;
    }

    // Getters
    public function getIdPlataformaFathomReads()
    {
        return $this->id_plataforma_FATHOM_READS;
    }

    public function getUserFathomReads()
    {
        return $this->user_FATHOM_READS;
    }

    public function getPasswordFathomReads()
    {
        return $this->password_FATHOM_READS;
    }

    // Setters
    public function setUserFathomReads($user_FATHOM_READS)
    {
        $this->user_FATHOM_READS = $user_FATHOM_READS;
    }

    public function setPasswordFathomReads($password_FATHOM_READS)
    {
        $this->password_FATHOM_READS = $password_FATHOM_READS;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
    {
        $sql = "INSERT INTO plataforma_FATHOM_READS (user_FATHOM_READS, password_FATHOM_READS) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $this->user_FATHOM_READS, $this->password_FATHOM_READS);

        if ($stmt->execute()) {
            echo "Registro insertado exitosamente";
        } else {
            echo "Error al insertar registro: " . $stmt->error;
        }

        $stmt->close();
    }
}
