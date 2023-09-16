<?php
$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
    case "getAvailableSlots":
        $names = ["Disponible", "Alberto Fernandez"];
        $indice = rand(0, 1);

        echo json_encode([
            "count" => 1,
            "name" => $names[$indice]
        ]);

        break;
    default:
        echo json_encode([
            "status" => false,
            "details" => "La accion enviada es invalida."
        ]);
}
