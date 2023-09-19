<?php
require_once("../models/areaModel.php");
require_once("../libs/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
    case "getAvailableSlots":
        $names = ["Disponible", "Gonzalo Fernandez"];
        $indice = rand(0, 1);

        echo json_encode([
            "count" => 1,
            "name" => $names[$indice]
        ]);

        break;

    case "insert":
        $nameZone = $request["data"]["name"];
        $numberZone = (int)$request["data"]["number"];

        if (!Validation::validateArray($request["data"])) return false;

        $area = new areaModel();
        $area->insert($numberZone, $nameZone);

        echo json_encode([
            "status" => true
        ]);

        break;

    case "update":
        $nameZone = $request["data"]["name"];
        $numberZone = $request["data"]["number"];

        if (!Validation::validateArray($request["data"])) return false;

        $area = new areaModel();
        $area->update($numberZone, $nameZone);

        break;

    case "delete":
        $numberZone = $request["data"]["number"];

        if (!Validation::validateArray($request["data"])) return false;

        $area = new areaModel();
        $area->delete($numberZone);

        break;
    default:
        echo json_encode([
            "status" => false,
            "details" => "La accion enviada es invalida."
        ]);
}
