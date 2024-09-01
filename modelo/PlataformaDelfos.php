<?php
class PlataformaDelfos
{
    private $id_plataforma_DELFOS;
    private $user_DELFOS;
    private $password_DELFOS;

    // Constructor para inicializar los atributos
    public function __construct($user_DELFOS, $password_DELFOS, $id_plataforma_DELFOS = null)
    {
        $this->id_plataforma_DELFOS = $id_plataforma_DELFOS;
        $this->user_DELFOS = $user_DELFOS;
        $this->password_DELFOS = $password_DELFOS;
    }

    // Getters
    public function getIdPlataformaDelfos()
    {
        return $this->id_plataforma_DELFOS;
    }

    public function getUserDelfos()
    {
        return $this->user_DELFOS;
    }

    public function getPasswordDelfos()
    {
        return $this->password_DELFOS;
    }

    // Setters
    public function setUserDelfos($user_DELFOS)
    {
        $this->user_DELFOS = $user_DELFOS;
    }

    public function setPasswordDelfos($password_DELFOS)
    {
        $this->password_DELFOS = $password_DELFOS;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
    {

        if ($this->user_DELFOS == null || $this->password_DELFOS == null) {
            throw new Exception("User and password cannot be null");
        }

        $sql = "INSERT INTO plataforma_delfos (user_DELFOS, password_DELFOS) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $this->user_DELFOS, $this->password_DELFOS);

        if ($stmt->execute()) {
            $this->id_plataforma_DELFOS = $conexion->insert_id; // Obtener el ID autogenerado
            //echo "Registro insertado exitosamente con ID: " . $this->id_plataforma_DELFOS;
            return $this->id_plataforma_DELFOS;
        } else {
            //echo "Error al insertar registro: " . $stmt->error;
            return null;
        }

        $stmt->close();
    }
}


