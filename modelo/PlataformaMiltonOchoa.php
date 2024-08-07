<?php 

class PlataformaMiltonOchoa
{
    private $id_plataforma_MILTON_OCHOA;
    private $user_MILTON_OCHOA;
    private $password_MILTON_OCHOA;

    // Constructor para inicializar los atributos
    public function __construct($user_MILTON_OCHOA, $password_MILTON_OCHOA, $id_plataforma_MILTON_OCHOA = null)
    {
        $this->id_plataforma_MILTON_OCHOA = $id_plataforma_MILTON_OCHOA;
        $this->user_MILTON_OCHOA = $user_MILTON_OCHOA;
        $this->password_MILTON_OCHOA = $password_MILTON_OCHOA;
    }

    // Getters
    public function getIdPlataformaMiltonOchoa()
    {
        return $this->id_plataforma_MILTON_OCHOA;
    }

    public function getUserMiltonOchoa()
    {
        return $this->user_MILTON_OCHOA;
    }

    public function getPasswordMiltonOchoa()
    {
        return $this->password_MILTON_OCHOA;
    }

    // Setters
    public function setUserMiltonOchoa($user_MILTON_OCHOA)
    {
        $this->user_MILTON_OCHOA = $user_MILTON_OCHOA;
    }

    public function setPasswordMiltonOchoa($password_MILTON_OCHOA)
    {
        $this->password_MILTON_OCHOA = $password_MILTON_OCHOA;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
    {
        $sql = "INSERT INTO plataforma_MILTON_OCHOA (user_MILTON_OCHOA, password_MILTON_OCHOA) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $this->user_MILTON_OCHOA, $this->password_MILTON_OCHOA);

        if ($stmt->execute()) {
            echo "Registro insertado exitosamente";
        } else {
            echo "Error al insertar registro: " . $stmt->error;
        }

        $stmt->close();
    }
}
