<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/usuarios_plataformas_gsnab/modelo');


// Ahora puedes incluir el archivo sin problemas

require_once('Conexion.php');
require_once('BuscarEstudiante.php');

class ConsultarUsuario {

    public function consultarUsuarioPorDocumento(string $documento): array
    {
    $response = "";
    $conexion = new Conexion();
    $conn = $conexion->conectar_db();

    try {
        $estudiante = BuscarEstudiante::findByIdentificacion($conn, $documento);

        if ($estudiante !== null) {
            // Asigna los datos del estudiante a $response (puede ser un mensaje o un objeto serializado a JSON)
            $response = [
                'status' => 'success',
                'data' => [
                    'nombre_estudiante' => $estudiante->getNombreEstudiante(),
                    'numero_identificacion' => $estudiante->getNumeroIdentificacion(),
                    'nombre_curso' => $estudiante->getNombreCurso(),
                    'nombre_estado' => $estudiante->getNombreEstado(),
                    'user_ARUKAY' => $estudiante->getUserARUKAY(),
                    'password_ARUKAY' => $estudiante->getPasswordARUKAY(),
                    'user_FATHOM_CAMBRIDGE' => $estudiante->getUserFATHOMCAMBRIDGE(),
                    'password_CAMBRIDGE' => $estudiante->getPasswordCAMBRIDGE(),
                    'user_DELFOS' => $estudiante->getUserDELFOS(),
                    'password_DELFOS' => $estudiante->getPasswordDELFOS(),
                    'user_FATHOM_READS' => $estudiante->getUserFATHOMREADS(),
                    'password_FATHOM_READS' => $estudiante->getPasswordFATHOMREADS(),
                    'user_MILTON_OCHOA' => $estudiante->getUserMILTONOCHOA(),
                    'password_MILTON_OCHOA' => $estudiante->getPasswordMILTONOCHOA()

                ]
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Estudiante no encontrado.'
            ];
        }

        } catch (Exception $e) {
            $response = "Error al consultar el usuario: " . $e->getMessage();
        } finally {
            $conexion->cerrar_conexion();
        }

        return $response;
        }

}