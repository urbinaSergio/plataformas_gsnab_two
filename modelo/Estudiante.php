<?php

class Estudiante
{
    private $id_estudiante;
    private $numero_identificacion;
    private $nombre_estudiante;
    private $cursos_id_cursos;
    private $estado_id_estado;
    private $fk_plataforma_cambridge;
    private $fk_plataforma_fathom_reads;
    private $fk_plataforma_milton_ochoa;
    private $fk_plataforma_arukay;
    private $plataforma_DELFOS_id_plataforma_DELFOS1;

    // Constructor para inicializar los atributos
    public function __construct(
        $numero_identificacion,
        $nombre_estudiante,
        $cursos_id_cursos,
        $estado_id_estado,
        $fk_plataforma_cambridge,
        $fk_plataforma_fathom_reads,
        $fk_plataforma_milton_ochoa,
        $fk_plataforma_arukay,
        $plataforma_DELFOS_id_plataforma_DELFOS1,
        $id_estudiante = null
    ) {
        $this->id_estudiante = $id_estudiante;
        $this->numero_identificacion = $numero_identificacion;
        $this->nombre_estudiante = $nombre_estudiante;
        $this->cursos_id_cursos = $cursos_id_cursos;
        $this->estado_id_estado = $estado_id_estado;
        $this->fk_plataforma_cambridge = $fk_plataforma_cambridge;
        $this->fk_plataforma_fathom_reads = $fk_plataforma_fathom_reads;
        $this->fk_plataforma_milton_ochoa = $fk_plataforma_milton_ochoa;
        $this->fk_plataforma_arukay = $fk_plataforma_arukay;
        $this->plataforma_DELFOS_id_plataforma_DELFOS1 = $plataforma_DELFOS_id_plataforma_DELFOS1;
    }

    // Getters
    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numero_identificacion;
    }

    public function getNombreEstudiante()
    {
        return $this->nombre_estudiante;
    }

    public function getCursosIdCursos()
    {
        return $this->cursos_id_cursos;
    }

    public function getEstadoIdEstado()
    {
        return $this->estado_id_estado;
    }

    public function getFkPlataformaCambridge()
    {
        return $this->fk_plataforma_cambridge;
    }

    public function getFkPlataformaFathomReads()
    {
        return $this->fk_plataforma_fathom_reads;
    }

    public function getFkPlataformaMiltonOchoa()
    {
        return $this->fk_plataforma_milton_ochoa;
    }

    public function getFkPlataformaArukay()
    {
        return $this->fk_plataforma_arukay;
    }

    public function getPlataformaDelfosId()
    {
        return $this->plataforma_DELFOS_id_plataforma_DELFOS1;
    }

    // Método para insertar un nuevo registro en la base de datos
    public function save($conexion)
{
    // La cadena de tipo debe coincidir con el número de variables
    $sql = "INSERT INTO estudiante (numero_identificacion, nombre_estudiante, cursos_id_cursos, estado_id_estado, fk_plataforma_cambridge, fk_plataforma_fathom_reads, fk_plataforma_milton_ochoa, fk_plataforma_arukay, plataforma_DELFOS_id_plataforma_DELFOS1) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    // Asegúrate de que la cadena de tipo 'sssssssss' coincida con los tipos de las variables
    $stmt->bind_param(
        "ssiiiiiii", // 9 variables
        $this->numero_identificacion,
        $this->nombre_estudiante,
        $this->cursos_id_cursos,
        $this->estado_id_estado,
        $this->fk_plataforma_cambridge,
        $this->fk_plataforma_fathom_reads,
        $this->fk_plataforma_milton_ochoa,
        $this->fk_plataforma_arukay,
        $this->plataforma_DELFOS_id_plataforma_DELFOS1
    );

    if ($stmt->execute()) {
        $this->id_estudiante = $conexion->insert_id; // Obtener el ID autogenerado
        //echo "Registro insertado exitosamente con ID: " . $this->id_estudiante;
        return $this->id_estudiante;
    } else {
        //echo "Error al insertar registro: " . $stmt->error;
        return null;
    }

    $stmt->close();
}
}
