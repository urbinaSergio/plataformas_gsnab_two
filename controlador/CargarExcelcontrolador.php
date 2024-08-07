<?php

require __DIR__ . '/../vendor/autoload.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:/xampp/htdocs/usuarios_plataformas_gsnab/modelo');

// Ahora puedes incluir el archivo sin problemas
require_once('Estudiante.php');


use PhpOffice\PhpSpreadsheet\IOFactory;


class CargarExcelcontrolador
{

    public function resivirExcel($excelBase64)
    {
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
            $sheetName = $sheet->getTitle();
            echo 'Procesando hoja: ' . $sheetName . PHP_EOL;

            $highestRow = $sheet->getHighestRow();

            for ($row = 2; $row <= $highestRow; $row++) {
                $cellValue = $sheet->getCell('C' . $row)->getValue();
                
                $estudiante = new Estudiante(
                    

                );
                
                
                
                if ($cellValue != '') {
                    echo 'El valor de la celda C' . $row . ' es: ' . $cellValue . PHP_EOL . '<br>';     
                } else {
                    echo 'La celda C' . $row . ' está vacía' . PHP_EOL . '<br>';
                }
          }


        }

        
        unlink($tempFilePath);






    }
}