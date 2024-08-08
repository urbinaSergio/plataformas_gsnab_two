<?php

class PlataformaCambridge
{
    private $id_plataforma_CAMBRIDGE;
    private $user_FATHOM_CAMBRIDGE;
    private $password_CAMBRIDGE;

    // Constructor para inicializar los atributos
    public function __construct($user_FATHOM_CAMBRIDGE, $password_CAMBRIDGE, $id_plataforma_CAMBRIDGE = null)
    {
        $this->id_plataforma_CAMBRIDGE = $id_plataforma_CAMBRIDGE;
        $this->user_FATHOM_CAMBRIDGE = $user_FATHOM_CAMBRIDGE;
        $this->password_CAMBRIDGE = $password_CAMBRIDGE;
    }

    // Getters
    public function getIdPlataformaCambridge()
    {
        return $this->id_plataforma_CAMBRIDGE;
    }

    public function getUserFathomCambridge()
    {
        return $this->user_FATHOM_CAMBRIDGE;
    }

    public function getPasswordCambridge()
    {
        return $this->password_CAMBRIDGE;
    }

    // Setters
    public function setUserFathomCambridge($user_FATHOM_CAMBRIDGE)
    {
        $this->user_FATHOM_CAMBRIDGE = $user_FATHOM_CAMBRIDGE;
    }

    public function setPasswordCambridge($password_CAMBRIDGE)
    {
        $this->password_CAMBRIDGE = $password_CAMBRIDGE;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
    {

        if ($this->user_FATHOM_CAMBRIDGE == null || $this->password_CAMBRIDGE == null) {
            throw new Exception("User and password cannot be null");
        }

        $sql = "INSERT INTO plataforma_cambridge (user_FATHOM_CAMBRIDGE, password_CAMBRIDGE) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $this->user_FATHOM_CAMBRIDGE, $this->password_CAMBRIDGE);

        if ($stmt->execute()) {
            $this->id_plataforma_CAMBRIDGE = $conexion->insert_id; // Obtener el ID autogenerado
            echo "Registro insertado exitosamente con ID: " . $this->id_plataforma_CAMBRIDGE;
            return $this->id_plataforma_CAMBRIDGE;
        } else {
            echo "Error al insertar registro: " . $stmt->error;
            return null;
        }

        $stmt->close();
    }
}
