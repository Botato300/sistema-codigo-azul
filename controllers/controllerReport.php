<?php
$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
    case "download":
        echo json_encode([
            "status" => true
        ]);
        break;
    default:
        echo json_encode([
            "status" => false,
            "details" => "La accion enviada es inválida."
        ]);
}
