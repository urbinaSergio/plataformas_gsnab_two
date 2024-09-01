<?php

class BuscarEstudiante
{
    // Atributos para los datos del estudiante
    private $nombre_estudiante;
    private $numero_identificacion;
    private $nombre_curso;
    private $nombre_estado;
    private $user_ARUKAY;
    private $password_ARUKAY;
    private $user_FATHOM_CAMBRIDGE;
    private $password_CAMBRIDGE;
    private $user_DELFOS;
    private $password_DELFOS;
    private $user_FATHOM_READS;
    private $password_FATHOM_READS;
    private $user_MILTON_OCHOA;
    private $password_MILTON_OCHOA;

    // Constructor para inicializar los atributos
    public function __construct($nombre_estudiante, $numero_identificacion, $nombre_curso, $nombre_estado, $user_ARUKAY, $password_ARUKAY, $user_FATHOM_CAMBRIDGE, $password_CAMBRIDGE, $user_DELFOS, $password_DELFOS, $user_FATHOM_READS, $password_FATHOM_READS, $user_MILTON_OCHOA, $password_MILTON_OCHOA)
    {
        $this->nombre_estudiante = $nombre_estudiante;
        $this->numero_identificacion = $numero_identificacion;
        $this->nombre_curso = $nombre_curso;
        $this->nombre_estado = $nombre_estado;
        $this->user_ARUKAY = $user_ARUKAY;
        $this->password_ARUKAY = $password_ARUKAY;
        $this->user_FATHOM_CAMBRIDGE = $user_FATHOM_CAMBRIDGE;
        $this->password_CAMBRIDGE = $password_CAMBRIDGE;
        $this->user_DELFOS = $user_DELFOS;
        $this->password_DELFOS = $password_DELFOS;
        $this->user_FATHOM_READS = $user_FATHOM_READS;
        $this->password_FATHOM_READS = $password_FATHOM_READS;
        $this->user_MILTON_OCHOA = $user_MILTON_OCHOA;
        $this->password_MILTON_OCHOA = $password_MILTON_OCHOA;
    }

    // Getters
    public function getNombreEstudiante()
    {
        return $this->nombre_estudiante;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numero_identificacion;
    }

    public function getNombreCurso()
    {
        return $this->nombre_curso;
    }

    public function getNombreEstado()
    {
        return $this->nombre_estado;
    }

    public function getUserARUKAY()
    {
        return $this->user_ARUKAY;
    }

    public function getPasswordARUKAY()
    {
        return $this->password_ARUKAY;
    }

    public function getUserFATHOMCAMBRIDGE()
    {
        return $this->user_FATHOM_CAMBRIDGE;
    }

    public function getPasswordCAMBRIDGE()
    {
        return $this->password_CAMBRIDGE;
    }

    public function getUserDELFOS()
    {
        return $this->user_DELFOS;
    }

    public function getPasswordDELFOS()
    {
        return $this->password_DELFOS;
    }

    public function getUserFATHOMREADS()
    {
        return $this->user_FATHOM_READS;
    }

    public function getPasswordFATHOMREADS()
    {
        return $this->password_FATHOM_READS;
    }

    public function getUserMILTONOCHOA()
    {
        return $this->user_MILTON_OCHOA;
    }

    public function getPasswordMILTONOCHOA()
    {
        return $this->password_MILTON_OCHOA;
    }

    // Setters
    public function setNombreEstudiante($nombre_estudiante)
    {
        $this->nombre_estudiante = $nombre_estudiante;
    }

    public function setNumeroIdentificacion($numero_identificacion)
    {
        $this->numero_identificacion = $numero_identificacion;
    }

    public function setNombreCurso($nombre_curso)
    {
        $this->nombre_curso = $nombre_curso;
    }

    public function setNombreEstado($nombre_estado)
    {
        $this->nombre_estado = $nombre_estado;
    }

    public function setUserARUKAY($user_ARUKAY)
    {
        $this->user_ARUKAY = $user_ARUKAY;
    }

    public function setPasswordARUKAY($password_ARUKAY)
    {
        $this->password_ARUKAY = $password_ARUKAY;
    }

    public function setUserFATHOMCAMBRIDGE($user_FATHOM_CAMBRIDGE)
    {
        $this->user_FATHOM_CAMBRIDGE = $user_FATHOM_CAMBRIDGE;
    }

    public function setPasswordCAMBRIDGE($password_CAMBRIDGE)
    {
        $this->password_CAMBRIDGE = $password_CAMBRIDGE;
    }

    public function setUserDELFOS($user_DELFOS)
    {
        $this->user_DELFOS = $user_DELFOS;
    }

    public function setPasswordDELFOS($password_DELFOS)
    {
        $this->password_DELFOS = $password_DELFOS;
    }

    public function setUserFATHOMREADS($user_FATHOM_READS)
    {
        $this->user_FATHOM_READS = $user_FATHOM_READS;
    }

    public function setPasswordFATHOMREADS($password_FATHOM_READS)
    {
        $this->password_FATHOM_READS = $password_FATHOM_READS;
    }

    public function setUserMILTONOCHOA($user_MILTON_OCHOA)
    {
        $this->user_MILTON_OCHOA = $user_MILTON_OCHOA;
    }

    public function setPasswordMILTONOCHOA($password_MILTON_OCHOA)
    {
        $this->password_MILTON_OCHOA = $password_MILTON_OCHOA;
    }

    // Método para obtener un estudiante por su número de identificación
    public static function findByIdentificacion($conexion, $numero_identificacion)
    {
        $sql = "SELECT e.nombre_estudiante, e.numero_identificacion, cu.nombre_curso, es.nombre_estado, pa.user_ARUKAY, pa.password_ARUKAY,
                        pc.user_FATHOM_CAMBRIDGE, pc.password_CAMBRIDGE, pd.user_DELFOS, pd.password_DELFOS, pr.user_FATHOM_READS, pr.password_FATHOM_READS, 
                        pm.user_MILTON_OCHOA, pm.password_MILTON_OCHOA
                FROM estudiante e
                INNER JOIN cursos cu ON e.cursos_id_cursos = cu.id_cursos
                INNER JOIN estado es ON e.estado_id_estado = es.id_estado
                INNER JOIN plataforma_arukay pa ON e.fk_plataforma_arukay = pa.id_plataforma_ARUKAY
                INNER JOIN plataforma_cambridge pc ON e.fk_plataforma_cambridge = pc.id_plataforma_CAMBRIDGE
                INNER JOIN plataforma_delfos pd ON e.plataforma_DELFOS_id_plataforma_DELFOS1 = pd.id_plataforma_DELFOS
                INNER JOIN plataforma_fathom_reads pr ON e.fk_plataforma_fathom_reads = pr.id_plataforma_FATHOM_READS
                INNER JOIN plataforma_milton_ochoa pm ON e.fk_plataforma_milton_ochoa = pm.id_plataforma_MILTON_OCHOA
                WHERE e.numero_identificacion = ?";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $numero_identificacion);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                return new BuscarEstudiante(
                    $row['nombre_estudiante'], $row['numero_identificacion'], $row['nombre_curso'], $row['nombre_estado'], 
                    $row['user_ARUKAY'], $row['password_ARUKAY'], $row['user_FATHOM_CAMBRIDGE'], $row['password_CAMBRIDGE'], 
                    $row['user_DELFOS'], $row['password_DELFOS'], $row['user_FATHOM_READS'], $row['password_FATHOM_READS'], 
                    $row['user_MILTON_OCHOA'], $row['password_MILTON_OCHOA']
                );
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        $stmt->close();
        return null;
    }
}

?>
