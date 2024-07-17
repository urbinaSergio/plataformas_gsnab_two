<?php

require __DIR__ . '/../vendor/autoload.php';

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
                
                if ($cellValue != '') {
                    echo 'El valor de la celda C' . $row . ' es: ' . $cellValue . PHP_EOL . '<br>';     
                } else {
                    echo 'La celda C' . $row . ' está vacía' . PHP_EOL . '<br>';
                }
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