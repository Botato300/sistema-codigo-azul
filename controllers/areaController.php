<?php
require_once("../models/areaModel.php");
require_once("../models/patientModel.php");
require_once("../models/professionalModel.php");
require_once("../models/areaModel.php");
require_once("../libs/helpers/validation.php");

$request = file_get_contents("php://input");
$request = json_decode($request, true);

switch ($request["action"]) {
    case "getAvailableArea":
        // $patient = new patientModel();
        // $prof = new professionalModel();

        // $patients = $patient->getAvailablePatients();
        // $medics = $prof->getAvailableMedics();
        // $nurses = $prof->getAvailableNurses();

        // $personData = $prof->selectPerson($medics["matricula"]);

        $fullNames = ["Maria González", "Carlos Rodríguez", "Laura Martínez", "Manuel Sánchez", "Sofía Fernández"];

        $names = ["Disponible", $fullNames[rand(0, 4)]];
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
        $content = $area->select($zoneNumber);

        if (is_null($content)) {
            echo json_encode([
                "status" => false
            ]);

            return false;
        }

        echo json_encode([
            "status" => true,
            "data" => $content
        ]);

        break;
    case "getAll":
        $area = new areaModel();
        $rows = $area->selectAll();

        if (empty($rows)) {
            echo json_encode([
                "status" => false
            ]);

            return false;
        }

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
