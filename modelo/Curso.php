<?php 

class Curso
{
    private $id_cursos;
    private $nombre_curso;

    // Constructor para inicializar los atributos
    public function __construct($nombre_curso, $id_cursos = null)
    {
        $this->id_cursos = $id_cursos;
        $this->nombre_curso = $nombre_curso;
    }

    // Getters
    public function getIdCursos()
    {
        return $this->id_cursos;
    }

    public function getNombreCurso()
    {
        return $this->nombre_curso;
    }

    // Setters
    public function setNombreCurso($nombre_curso)
    {
        $this->nombre_curso = $nombre_curso;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
    {
        $sql = "INSERT INTO cursos (nombre_curso) VALUES (?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $this->nombre_curso);

        if ($stmt->execute()) {
            echo "Registro insertado exitosamente";
        } else {
            echo "Error al insertar registro: " . $stmt->error;
        }

        $stmt->close();
    }
}
