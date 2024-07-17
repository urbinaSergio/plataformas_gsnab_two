<?
class PlataformaARUKAY
{
    private $id_plataforma_ARUKAY;
    private $user_ARUKAY;
    private $password_ARUKAY;

    // Constructor para inicializar los atributos
    public function __construct($user_ARUKAY, $password_ARUKAY, $id_plataforma_ARUKAY = null)
    {
        $this->id_plataforma_ARUKAY = $id_plataforma_ARUKAY;
        $this->user_ARUKAY = $user_ARUKAY;
        $this->password_ARUKAY = $password_ARUKAY;
    }

    // Getters
    public function getIdPlataformaARUKAY()
    {
        return $this->id_plataforma_ARUKAY;
    }

    public function getUserARUKAY()
    {
        return $this->user_ARUKAY;
    }

    public function getPasswordARUKAY()
    {
        return $this->password_ARUKAY;
    }

    // Setters
    public function setUserARUKAY($user_ARUKAY)
    {
        $this->user_ARUKAY = $user_ARUKAY;
    }

    public function setPasswordARUKAY($password_ARUKAY)
    {
        $this->password_ARUKAY = $password_ARUKAY;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
    {
        $sql = "INSERT INTO plataforma_ARUKAY (user_ARUKAY, password_ARUKAY) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $this->user_ARUKAY, $this->password_ARUKAY);

        if ($stmt->execute()) {
            echo "Registro insertado exitosamente";
        } else {
            echo "Error al insertar registro: " . $stmt->error;
        }

        $stmt->close();
    }
}
