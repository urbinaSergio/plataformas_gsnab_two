<?php

include_once '../../controlador/ConsultarUsuario.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/usuarios_plataformas_gsnab/apirest/consultar/') {
    // Leer el cuerpo de la solicitud JSON
    $inputJSON = file_get_contents('php://input');

    // Decodificar el JSON en un array asociativo
    $data = json_decode($inputJSON, true);


    //nombre de la variable que se esat enviando en el Json en Postman
    $numero_documento = $data['numero_documento'];

    $consultarUsuario = new ConsultarUsuario();

    $response = $consultarUsuario->consultarUsuarioPorDocumento($numero_documento);



    // Aquí puedes procesar los datos recibidos, por ejemplo, guardarlos en la base de datos
    // o realizar otras acciones según tus necesidades

    // Devolver una respuesta
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Terminar la ejecución del script

}
