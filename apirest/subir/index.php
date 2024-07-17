<?php
include_once '../../controlador/CargarExcelcontrolador.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/usuarios_plataformas_gsnab/apirest/subir/') {
    // Leer el cuerpo de la solicitud JSON
    $inputJSON = file_get_contents('php://input');

    // Decodificar el JSON en un array asociativo
    $data = json_decode($inputJSON, true);


    //nombre de la variable que se esat enviando en el Json en Postman
    $archivo_excel = $data['excel'];

    $cargarExcelcontrolador = new CargarExcelcontrolador();

    $cargarExcelcontrolador->resivirExcel($archivo_excel);



    // Aquí puedes procesar los datos recibidos, por ejemplo, guardarlos en la base de datos
    // o realizar otras acciones según tus necesidades

    // Devolver una respuesta

    $response = ['status' => 'success', 'message' => 'Datos recibidos correctamente'];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Terminar la ejecución del script

}
