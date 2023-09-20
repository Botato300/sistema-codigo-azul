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
        $zoneName = $request["data"]["name"];
        $zoneNumber = (int)$request["data"]["number"];

        if (!Validation::validateArray($request["data"])) return false;

        try {
            $area = new areaModel();
            $area->insert($zoneNumber, $zoneName);
        } catch (Exception) {
            echo json_encode([
                "status" => false
            ]);
            return false;
        }

        echo json_encode([
            "status" => true,
            "zoneName" => $zoneName,
            "zoneNumber" => $zoneNumber
        ]);

        break;

    case "update":
        $zoneName = $request["data"]["name"];
        $zoneNumber = $request["data"]["number"];

        if (!Validation::validateArray($request["data"])) return false;

        $area = new areaModel();
        $area->update($zoneNumber, $zoneName);

        echo json_encode([
            "status" => true
        ]);

        break;

    case "delete":
        $zoneNumber = $request["data"]["number"];

        if (!Validation::validateArray($request["data"])) return false;

        $area = new areaModel();
        $area->delete($zoneNumber);

        echo json_encode([
            "status" => true
        ]);

        break;

    case "search":
        $zoneNumber = $request["data"]["zoneNumber"];

        if (!Validation::validateArray($request["data"])) return false;

        $area = new areaModel();
        $area->selectAll($zoneNumber);

        echo json_encode([
            "status" => true
        ]);

        break;
    case "getAll":
        $area = new areaModel();
        $rows = $area->selectAll();

        echo json_encode([
            "status" => true,
            "data" => $rows
        ]);
        break;
    default:
        echo json_encode([
            "status" => false,
            "details" => "La accion enviada es invalida."
        ]);
}
