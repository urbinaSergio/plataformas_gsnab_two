<?php

require __DIR__ . '/../vendor/autoload.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/usuarios_plataformas_gsnab/modelo');


// Ahora puedes incluir el archivo sin problemas

require_once('Conexion.php');
require_once('Curso.php');
require_once('Estado.php');
require_once('PlataformaArukay.php');
require_once('PlataformaCambridge.php');
require_once('PlataformaMiltonOchoa.php');
require_once('PlataformaFathomReads.php');
require_once('PlataformaDelfos.php');
require_once('Estudiante.php');






use PhpOffice\PhpSpreadsheet\IOFactory;


class CargarExcelcontrolador
{

    public function resivirExcel($excelBase64)
    {

        $conexion = new Conexion();
        $conn = $conexion->conectar_db();


        $sqlTruncate = "
                -- Desactivar las verificaciones de claves foráneas
                SET FOREIGN_KEY_CHECKS = 0;

                -- Truncar las tablas
                TRUNCATE TABLE estudiante;
                TRUNCATE TABLE plataforma_arukay;
                TRUNCATE TABLE plataforma_cambridge;
                TRUNCATE TABLE plataforma_delfos;
                TRUNCATE TABLE plataforma_fathom_reads;
                TRUNCATE TABLE plataforma_milton_ochoa;

                -- Volver a activar las verificaciones de claves foráneas
                SET FOREIGN_KEY_CHECKS = 1;
            ";

            // Ejecutar múltiples sentencias
            if ($conn->multi_query($sqlTruncate)) {
                do {
                    // Avanzar a la siguiente consulta (si hay más)
                    if ($conn->next_result()) {
                        continue;
                    }
                } while ($conn->more_results());

                //echo "Consultas ejecutadas correctamente.";
            } else {
                //echo "Error en la ejecución de las consultas: " . $conn->error;
            }

        $excelData = base64_decode($excelBase64);

        // Verificar si la decodificación fue exitosatef

            
        // Crear un nombre de archivo temporal
        $tempFilePath = tempnam(sys_get_temp_dir(), 'excel_') . '.xlsx';

        file_put_contents($tempFilePath, $excelData);

        $spreadsheet = IOFactory::load($tempFilePath);

        $sheetCount = $spreadsheet->getSheetCount();

        


        for ($index = 0; $index < $sheetCount; $index++) {
            // Acceder a la hoja por índice
            $sheet = $spreadsheet->getSheet($index);
        
            // Obtener el nombre de la hoja
            $highestRow = $sheet->getHighestRow();
        
            for ($row = 2; $row <= $highestRow; $row++) {
                $numero_identificacion = $sheet->getCell('A' . $row)->getValue();
                $nombre_estudiante = $sheet->getCell('C' . $row)->getValue();
                $buscarCursoNombre = $sheet->getCell('D' . $row)->getValue();
                $curso = Curso::findByName($conn, $buscarCursoNombre);
                $buscarEsatdoNombre = $sheet->getCell('B' . $row)->getValue();
                $estado = Estado::findByName($conn, $buscarEsatdoNombre);



        
                $user_fathom_reads = $sheet->getCell('F' . $row)->getValue();
                $password_fathom_reads = $sheet->getCell('G' . $row)->getValue();

                if ($user_fathom_reads != null && $password_fathom_reads != null) {
                    $plataforma_fathom_reads = new PlataformaFathomReads($user_fathom_reads, $password_fathom_reads);
                    $id_insertado_fathom = $plataforma_fathom_reads->save($conn);
                } else {
                    //echo "User or password for Fathom Reads cannot be null" . PHP_EOL;
                    continue; // Skip to the next row
                }


                
                // PlataformaCambridge
                $user_cambridge = $sheet->getCell('R' . $row)->getValue();
                $password_cambridge = $sheet->getCell('S' . $row)->getValue();
                if ($user_cambridge != null && $password_cambridge != null) {
                    $plataforma_cambridge = new PlataformaCambridge($user_cambridge, $password_cambridge);
                    $id_insertado_cambridge = $plataforma_cambridge->save($conn);
                } else {
                    //echo "User or password for Cambridge cannot be null" . PHP_EOL;
                    continue;
                }


        
                // PlataformaMiltonOchoa
               $user_milton = $sheet->getCell('L' . $row)->getValue();
               $password_milton = $sheet->getCell('M' . $row)->getValue();
            
                  if ($user_milton != null && $password_milton != null) {
                    $plataforma_milton_ochoa = new PlataformaMiltonOchoa($user_milton, $password_milton);
                    $id_insertado_milton = $plataforma_milton_ochoa->save($conn);
                } else {
                    continue;
                }


        
                // PlataformaArukay
                $user_arukay = $sheet->getCell('O' . $row)->getValue();
                $password_arukay = $sheet->getCell('P' . $row)->getValue();
                if ($user_arukay != null && $password_arukay != null) {
                    $plataforma_arukay = new PlataformaArukay($user_arukay, $password_arukay);
                    $id_insertado_arukay = $plataforma_arukay->save($conn);
                } else {
                    continue;
                }
        
                // PlataformaDelfos
                $user_delfos = $sheet->getCell('I' . $row)->getValue();
                $password_delfos = $sheet->getCell('J' . $row)->getValue();
                if ($user_delfos != null && $password_delfos != null) {
                    $plataforma_delfos = new PlataformaDelfos($user_delfos, $password_delfos);
                    $id_insertado_delfos = $plataforma_delfos->save($conn);
                } else {
                    continue;
                }
        
                $estudiante = new Estudiante(
                    $numero_identificacion,
                    $nombre_estudiante,
                    $curso->getIdCursos(),
                    $estado->getIdEstado(),
                    $id_insertado_cambridge,
                    $id_insertado_fathom,
                    $id_insertado_milton,
                    $id_insertado_arukay,
                    $id_insertado_delfos
                );
        
                $estudiante->save($conn);
        
                /*if ($nombre_estudiante != '') {
                    echo 'El valor de la celda C' . $row . ' es: ' . $nombre_estudiante . PHP_EOL . '<br>';     
                } else {
                    echo 'La celda C' . $row . ' está vacía' . PHP_EOL . '<br>';
                }*/
                
            }
        }

        
        unlink($tempFilePath);

        $conexion->cerrar_conexion();






    }
}