<?php

require __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


class CargarExcelcontrolador
{

    public function resivirExcel($excelBase64)
    {
        $excelData = base64_decode($excelBase64);

        // Verificar si la decodificación fue exitosate


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
            //echo 'Procesando hoja: ' . $sheetName . PHP_EOL;

            // Obtener el valor de la celda C2 en esta hoja
            $cellValue = $sheet->getCell('C2')->getValue();
            if ($cellValue != '') {
                //echo 'El valor de nombre de celda A2 es: ' . $cellValue . PHP_EOL.'<br>';     
            } else {
                echo 'Eta vacio';
            }


        }

        // Puedes manipular el archivo de Excel aquí
        //$sheet = $spreadsheet->getActiveSheet();
        //$cellValue = $sheet->getCell('A2')->getValue();

        // Imprimir el valor de la celda A1 como ejemplo
        //echo 'El valor de la celda A1 es: ' . $cellValue;

        // Eliminar el archivo temporal
        unlink($tempFilePath);






    }
}